<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Member;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [[
            'href' => '/admin/order',
            'slot' => 'Data Pemesanan'
        ]];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', [
            'title' => 'Riwayat Pemesanan',
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create', [
            'title' => 'Tambah Pemesanan',
            'packages' => Package::all(),
            'bookings' => Booking::all(),
            'members' => Member::all(),
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->booking_id) {
            $validatedData = $request->validate([
                'package_id' => 'required',
                'vehicle_id' => 'nullable',
                'member_id' => 'nullable',
                'name' => 'nullable',
                'date' => 'required',
                'time' => 'required',
            ], [], [
                'package_id' => 'paket',
                'date' => 'tanggal',
                'time' => 'waktu',
            ]);
            $booking = Booking::create($validatedData);
        } else {
            $booking = Booking::find($request->booking_id);
        }
        Order::create(
            [
                'booking_id' => $booking->id,
                'total_price' => $booking->package->price,
                'status' => $booking->status,
                'customer_records' => $booking->customer_records,
            ]
        );
        return redirect('/admin/order')->with('success', 'Data Pemesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show', [
            'title' => 'Detail Pemesanan',
            'order' => $order,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'title' => 'Sunting Pemesanan',
            'order' => $order,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'customer_records' => 'required',
        ]);

        $order->update($validatedData);
        return redirect('/admin/order')->with('success', 'Pemesanan diperbarui');
    }

    function checkout(Request $request, Order $order)
    {
        $order->update([
            'status' => 'completed',
        ]);
        $order->booking->update([
            'status' => 'completed',
        ]);
        return back()->with('success', 'Pemesanan berhasil dicheckout');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/admin/order')->with('success', 'Data Pemesanan dihapus');
    }
}
