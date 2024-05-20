<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminVehicleController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/member',
            'slot' => 'Data Member'
        ]];
    }


    public function addDynamicHeader(Member $member)
    {
        $this->headers[] = [
            'href' => "/admin/member/{$member->id}/vehicle",
            'slot' => 'Data Kendaraan'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Member $member)
    {
        return view('admin.member.vehicle.index', [
            'title' => 'Data Kendaraan',
            'member' => $member,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Member $member)
    {
        $this->addDynamicHeader($member);
        return view('admin.member.vehicle.create', [
            'title' => 'Tambah Data Kendaraan',
            'member' => $member,
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Member $member)
    {

        $validatedData = $request->validate([
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
            $validatedData['member_id'] = $member->id;
        }
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vehicle-image');
            $validatedData['image'] = $path;
        }

        Vehicle::create($validatedData);
        return redirect("/admin/member/$member->id/vehicle")->with('success', 'Data Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member, Vehicle $vehicle)
    {
        return view('admin.member.vehicle.show', [
            'title' => 'Detail Kendaraan',
            'member' => $member,
            'vehicle' => $vehicle,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member, Vehicle $vehicle)
    {
        return view('admin.member.vehicle.edit', [
            'title' => 'Sunting Kendaraan',
            'member' => $member,
            'vehicle' => $vehicle,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Member $member, Request $request, Vehicle $vehicle)
    {
        $validatedData = $request->validate([
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
            $validatedData['image'] = $path;
        } else {
            $validatedData['image'] = $vehicle->image;
        }
        $vehicle->update($validatedData);
        return redirect("/admin/member/$member->id/vehicle")->with('success', 'Data Kendaraan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member, Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect("/admin/member/$member->id/vehicle")->with('success', 'Data Kendaraan berhasil dihapus');
    }


    public function getVehiclesByMember(Member $member)
    {
        return response()->json(['vehicles' => $member->vehicles]);
    }
}
