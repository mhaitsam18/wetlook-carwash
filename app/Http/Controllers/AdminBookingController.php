<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Member;
use App\Models\Order;
use App\Models\Package;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminBookingController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/booking',
            'slot' => 'Data Booking'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = Carbon::now()->toDateString();
        return view('admin.booking.index', [
            'title' => 'Data Booking',
            'bookings' => Booking::all(),
        ]);
    }

    public function getVehicle(Request $request)
    {
        $vehicle = Vehicle::where('member_id', $request->member_id)->get();

        return response()->json($vehicle);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create', [
            'title' => 'Booking',
            'packages' => Package::all(),
            'members' => Member::all(),
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'package_id' => 'required',
            'vehicle_id' => 'nullable',
            'member_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'status' => 'required',
        ], [], [
            'package_id' => 'paket',
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
        return redirect('/admin/booking')->with('success', 'Booking berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('admin.booking.show', [
            'title' => 'Detail Booking',
            'booking' => $booking,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', [
            'title' => 'Sunting Booking',
            'booking' => $booking,
            'packages' => Package::all(),
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validateData = $request->validate([
            'package_id' => 'required',
            'vehicle_id' => 'nullable',
            'member_id' => 'nullable',
            'date' => 'required',
            'time' => 'required',
            'status' => 'required',
        ], [], [
            'package_id' => 'paket',
            'date' => 'tanggal',
            'time' => 'waktu',
        ]);


        $booking->update($validateData);

        $totalPrice = $booking->order->details->isNotEmpty() ? $booking->order->details->sum('sub_total_price') + $booking->package->price : $booking->package->price;

        $booking->order->update(
            [
                'total_price' => $totalPrice,
                'status' => $request->status,
            ]
        );
        return redirect('/admin/booking')->with('success', 'Booking diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect('/admin/booking')->with('success', 'Data Booking dihapus / dibatalkan');
    }
}
