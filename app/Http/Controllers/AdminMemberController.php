<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminMemberController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/member',
            'slot' => 'Data Member'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.member.index', [
            'title' => 'Data Member',
            'members' => Member::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create', [
            'title' => 'Tambah Member',
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
        if ($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('user-photo');
        };
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'member',
            'photo' => $validatedData['photo'],
        ]);
        Member::create([
            'user_id' => $user->id,
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
        ]);
        return redirect('/admin/member')->with('success', 'Data Member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.member.show', [
            'title' => 'Detail Member',
            'member' => $member,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit', [
            'title' => 'Sunting Member',
            'member' => $member,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $member->user->id,
            'username' => 'required|string|unique:users,username,' . $member->user->id,
            'phone_number' => ['nullable', 'string', 'unique:members,phone_number,' . $member->id, 'regex:/^(?:\+62|0)[0-9\s-]+$/'],
            'address' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3145728',
            'password' => 'nullable|confirmed',  // Membuat password menjadi nullable
        ]);

        // Assign custom attribute names:
        $validator->customAttributes = [
            'name' => 'Nama Lengkap',
            'username' => 'Nama Pengguna',
            'phone_number' => 'Nomor Ponsel',
            'address' => 'Nomor Ponsel',
            'photo' => 'Foto',
        ];


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Terjadi kesalahan dalam pengisian formulir.')
                ->withInput();
        }
        $user = User::find($request->id);
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

        if ($request->filled('password')) {  // Memeriksa apakah password diinputkan
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        $member->update([
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address')
        ]);

        return redirect('/admin/member')->with('success', 'Data Member berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        User::destroy($member->user_id);
        $member->delete();
        return redirect('/admin/member')->with('success', 'Data Member berhasil dihapus');
    }
}
