<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAdminController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/admin',
            'slot' => 'Data Admin'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin.index', [
            'title' => 'Data Admin',
            'admins' => Admin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create', [
            'title' => 'Tambah Admin',
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3145728',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('user-photo');
            $validatedData['photo'] = $path;
        }
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'admin',
            'photo' => $validatedData['photo'],
        ]);
        Admin::create([
            'user_id' => $user->id,
        ]);
        return redirect('/admin/admin')->with('success', 'Data Admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return view('admin.admin.show', [
            'title' => 'Detail Admin',
            'admin' => $admin,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', [
            'title' => 'Sunting Admin',
            'admin' => $admin,
            'headers' => $this->headers
        ]);
    }
    public function editPassword(Admin $admin)
    {
        return view('admin.admin.edit-password', [
            'title' => 'Ganti Kata Sandi',
            'admin' => $admin,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $admin->user->id,
            'username' => 'required|string|unique:users,username,' . $admin->user->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3145728',
        ]);

        // Assign custom attribute names:
        $validator->customAttributes = [
            'name' => 'Nama Lengkap',
            'username' => 'Nama Pengguna',
            'phone_number' => 'Nomor Ponsel',
        ];


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Terjadi kesalahan dalam pengisian formulir.')
                ->withInput();
        }
        $user = User::find($admin->user_id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->name = $request->input('name');
        $user->email = strtolower($request->input('email'));
        $user->username = strtolower($request->input('username'));
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('user-photo');
            $user->photo = $path;
        }
        $user->save();
        return redirect()->back()->with('success', 'Data Admin berhasil diperbarui.');
    }

    public function updatePassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|confirmed|different:current_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Terjadi kesalahan dalam pengisian formulir.')
                ->with('form', 'change-password')
                ->withInput();
        }

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()
                ->with('error', 'Password saat ini tidak cocok.')
                ->withInput();
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        User::destroy($admin->user_id);
        $admin->delete();
        return redirect('/admin/admin')->with('success', 'Data Admin berhasil dihapus');
    }
}
