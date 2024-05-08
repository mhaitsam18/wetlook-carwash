<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        } else if (auth()->user()->role == 'admin') {
            return redirect('/admin/index');
        } else if (auth()->user()->role == 'member') {
            return redirect('/member/index');
        } else {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/');
        }
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'login'
        ]);
    }

    public function checkUsernameAvailability($username)
    {
        $isAvailable = User::where('username', $username)->count() === 0;
        return response()->json(['status' => $isAvailable ? 'available' : 'used']);
    }

    public function checkEmailAvailability($email)
    {
        $isAvailable = User::where('email', $email)->count() === 0;
        return response()->json(['status' => $isAvailable ? 'available' : 'used']);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Registrasi'
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        // if ($request->file('photo')) {
        //     $validatedData['photo'] = $request->file('photo')->store('user-photo');
        // };
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'member',
            // 'photo' => $validatedData['photo'],
        ]);
        Member::create([
            'user_id' => $user->id,
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            // 'photo' => $validatedData['photo'],
        ]);
        // $verificationLink = $this->generateVerificationLink($user);
        // Mail::to($user->email)->send(new VerificationEmail($verificationLink));
        return redirect('/login')->with('success', 'Email verifikasi telah dikirim. Silakan cek email Anda!');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email_or_username' => ['required'],
            'password' => ['required'],
        ]);
        $isEmail = filter_var($credentials['email_or_username'], FILTER_VALIDATE_EMAIL);
        $user = $isEmail
            ? User::where('email', $credentials['email_or_username'])->first()
            : User::where('username', $credentials['email_or_username'])->first();
        if (!$user) {
            return back()->with('loginError', 'Email atau Username atau Password Salah');
        }
        // if (!$user->hasVerifiedEmail()) {
        //     $user->sendEmailVerificationNotification();
        //     return back()->with('loginError', 'Email Anda belum diverifikasi, Silahkan cek Email Anda');
        // }
        $credential['password'] = $request->input('password');
        if ($user->email) {
            $credential['email'] = $user->email;
        } elseif ($user->username) {
            $credential['username'] = $user->username;
        } else {
            return back()->with('loginError', 'Email atau Username atau Password Salah');
        }
        $remember = $request->has('remember');
        if (Auth::attempt($credential, $remember)) {
            $request->session()->regenerate();
            switch (auth()->user()->role) {
                case 'admin':
                    return redirect()->intended('/admin/index');
                    break;
                case 'member':
                    $member = Member::where('user_id', auth()->user()->id)->first();
                    $request->session()->put('member', $member);
                    $request->session()->put('member_id', $member->id);
                    return redirect()->intended('/member/index');
                    break;
                default:
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->with('loginError', 'Akun Anda tidak memiliki otoritas apapun, Hubungi Admin terkait');
                    break;
            }
        }
        return back()->with('loginError', 'Email atau Username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
