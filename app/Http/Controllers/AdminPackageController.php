<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminPackageController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/package',
            'slot' => 'Data Paket'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.package.index', [
            'title' => 'Data Paket',
            'packages' => Package::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create', [
            'title' => 'Tambah paket',
            'rooms' => Room::all(),
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_id' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'duration' => 'integer',
            'price' => 'integer',
        ], [], [
            'room_id' => 'ruangan',
            'name' => 'nama paket',
            'description' => 'deskripsi',
            'duration' => 'durasi',
            'price' => 'harga',
        ]);
        Package::create($validateData);

        return redirect("/admin/package")->with('success', 'Data Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view('admin.package.show', [
            'title' => 'Detail Paket',
            'package' => $package,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.package.edit', [
            'title' => 'Sunting Paket',
            'rooms' => Room::all(),
            'package' => $package,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $validateData = $request->validate([
            'room_id' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'duration' => 'integer',
            'price' => 'integer',
        ], [], [
            'room_id' => 'ruangan',
            'name' => 'nama paket',
            'description' => 'deskripsi',
            'duration' => 'durasi',
            'price' => 'harga',
        ]);
        $package->update($validateData);

        return redirect("/admin/package")->with('success', 'Data Paket berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect("/admin/package")->with('success', 'Data Paket berhasil dihapus');
    }
}
