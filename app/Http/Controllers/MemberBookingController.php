<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Order;
use App\Models\Package;
use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class MemberBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.booking.index', [
            'title' => 'Histori Pemesanan Saya',
            'bookings' => Booking::where('member_id', auth()->user()->member->id)->get(),
            'packages' => Package::all(),
            'vehicles' => Vehicle::where('member_id', auth()->user()->member->id)->get()
        ]);
    }

    public function booking()
    {
        $currentDate = Carbon::now()->toDateString();
        return view('member.booking.booking', [
            'title' => 'Bookingan Saya',
            'bookings' => Booking::where('member_id', auth()->user()->member->id)->whereDate('date', '>=', $currentDate)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.booking.create', [
            'title' => 'Booking',
            'packages' => Package::all(),
            'vehicles' => Vehicle::where('member_id', auth()->user()->member->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'package_id' => 'required',
            'vehicle_id' => 'required',
            'member_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
        ], [], [
            'package_id' => 'paket',
            'vehicle_id' => 'kendaraan',
            'date' => 'tanggal',
            'time' => 'waktu',
        ]);

        $booking = Booking::create($validateData);
        Order::create(
            [
                'booking_id' => $booking->id,
                'total_price' => $booking->package->price,
                'status' => $booking->status,
            ]
        );
        return redirect('/member/booking')->with('success', 'Booking berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('member.booking.show', [
            'title' => 'Detail Booking',
            'booking' => $booking,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('member.booking.edit', [
            'title' => 'Sunting Booking',
            'booking' => $booking,
            'packages' => Package::all(),
            'vehicles' => Vehicle::where('member_id', auth()->user()->member->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validateData = $request->validate([
            'package_id' => 'required',
            'vehicle_id' => 'required',
            'member_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
        ], [], [
            'package_id' => 'paket',
            'vehicle_id' => 'kendaraan',
            'date' => 'tanggal',
            'time' => 'waktu',
        ]);

        $booking->update($validateData);
        return redirect('/member/booking')->with('success', 'Booking diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect('/member/booking')->with('success', 'Data Booking dihapus / dibatalkan');
    }
}
