<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminOrderPaymentController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [
            [
                'href' => '/admin/order',
                'slot' => 'Data Pemesanan'
            ],
        ];
    }

    public function addDynamicHeader(Order $order)
    {
        $this->headers[] = [
            'href' => "/admin/order/{$order->id}/payment",
            'slot' => 'Pembayaran'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
    {
        return view('admin.order.payment.index', [
            'title' => 'Pembayaran',
            'order' => $order,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $this->addDynamicHeader($order);

        return view('admin.order.payment.create', [
            'title' => 'Tambah Pembayaran',
            'order' => $order,
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'order_id' => 'nullable',
            'evidence' => 'required|mimes:jpeg,png,jpg,gif,pdf|max:3145728',
            'amount' => 'required',
        ], [], [
            'order_id' => 'pemesanan',
            'evidence' => 'bukti',
            'amount' => 'jumlah',
        ]);
        if ($request->hasFile('evidence')) {
            $path = $request->file('evidence')->store('payment-evidence');
            $validatedData['evidence'] = $path;
        }
        Payment::create([
            'order_id' => $validatedData['order_id'] ?? $order->id,
            'evidence' => $validatedData['evidence'],
            'amount' => $validatedData['amount'],
        ]);

        return redirect("/admin/order/$order->id/payment")->with('success', 'Data Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, Payment $payment)
    {
        $this->addDynamicHeader($order);
        return view('admin.order.payment.show', [
            'title' => 'Pembayaran',
            'order' => $order,
            'payment' => $payment,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, Payment $payment)
    {
        $this->addDynamicHeader($order);
        return view('admin.order.payment.edit', [
            'title' => 'Edit Pembayaran',
            'order' => $order,
            'payment' => $payment,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, Payment $payment)
    {
        $validatedData = $request->validate([
            'evidence' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:3145728',
            'amount' => 'required',
        ], [], [
            'evidence' => 'bukti',
            'amount' => 'jumlah',
        ]);
        if ($request->hasFile('evidence')) {
            $path = $request->file('evidence')->store('payment-evidence');
            $validatedData['evidence'] = $path;
        }
        $payment->update([
            'evidence' => $validatedData['evidence'],
            'amount' => $validatedData['amount']
        ]);

        return redirect("/admin/order/$order->id/payment")->with('success', 'Data Pembayaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, Payment $payment)
    {
        $payment->delete();
        return redirect("/admin/order/$order->id/payment")->with('success', 'Data Pembayaran berhasil dihapus');
    }
}
