<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [
            [
                'href' => '/admin/room',
                'slot' => 'Data Ruang'
            ],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.room.index', [
            'title' => 'Data Ruang',
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create', [
            'title' => 'Tambah Ruang',
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'amount' => 'required|integer',
        ], [], [
            'type' => 'tipe',
            'amount' => 'jumlah',
        ]);
        Room::create($validatedData);

        return redirect("/admin/room")->with('success', 'Data Ruang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('admin.room.show', [
            'title' => 'Detail Ruang',
            'room' => $room,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.room.edit', [
            'title' => 'Sunting Ruang',
            'room' => $room,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'amount' => 'required|integer',
        ], [], [
            'type' => 'tipe',
            'amount' => 'jumlah',
        ]);
        $room->update($validatedData);

        return redirect("/admin/room")->with('success', 'Data Ruang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect("/admin/room")->with('success', 'Data Ruang berhasil dihapus');
    }
}
