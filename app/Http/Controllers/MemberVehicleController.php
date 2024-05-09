<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class MemberVehicleController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/member/vehicle',
            'slot' => 'Kendaraan Saya'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.vehicle.index', [
            'title' => 'Kendaraan Saya',
            'vehicles' => Vehicle::where('member_id', auth()->user()->member->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.vehicle.create', [
            'title' => 'Tambah Kendaraan',
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'member_id' => 'nullable',
            'plate_number' => 'required|string',
            'type' => 'required',
            'make' => 'required|string',
            'model' => 'required|string',
            'colour' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3145728',
        ], [], [
            'plate_number' => 'plat nomor',
            'type' => 'tipe kendaraan',
            'make' => 'merek motor',
            'model' => 'model',
            'colour' => 'warna',
            'image' => 'gambar',
        ]);
        if (!$request->filled('member_id')) {
            $validateData['member_id'] = auth()->user()->member->id;
        }
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vehicle-image');
            $validateData['image'] = $path;
        }

        Vehicle::create($validateData);
        return redirect('/member/vehicle')->with('success', 'Data Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('member.vehicle.show', [
            'title' => 'Detail Kendaraan',
            'vehicle' => $vehicle,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('member.vehicle.edit', [
            'title' => 'Sunting Kendaraan',
            'vehicle' => $vehicle,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validateData = $request->validate([
            'member_id' => 'nullable',
            'plate_number' => 'required|string',
            'type' => 'required',
            'make' => 'required|string',
            'model' => 'required|string',
            'colour' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3145728',
        ], [], [
            'plate_number' => 'plat nomor',
            'type' => 'tipe kendaraan',
            'make' => 'merek motor',
            'model' => 'model',
            'colour' => 'warna',
            'image' => 'gambar',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vehicle-image');
            $validateData['image'] = $path;
        } else {
            $validateData['image'] = $vehicle->image;
        }
        $vehicle->update($validateData);
        return redirect('/member/vehicle')->with('success', 'Data kendaraan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect('/member/vehicle')->with('success', 'Data Kendaraan berhasil dihapus');
    }
}
