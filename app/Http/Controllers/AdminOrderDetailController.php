<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderDetailController extends Controller
{
    public $headers = [];

    public function __construct(Order $order)
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
            'href' => "/admin/order/{$order->id}/detail",
            'slot' => 'Detail Pemesanan'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
    {
        return view('admin.order.detail.index', [
            'title' => 'Detail Pemesanan',
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

        // Membuat query untuk produk
        $products = Product::where(function ($query) use ($order) {
            // Jika dalam booking terdapat package_id, tampilkan produk dengan package_id yang sama dari data booking
            if ($order->booking && $order->booking->package_id) {
                $query->where('package_id', $order->booking->package_id)
                    ->orWhereNull('package_id');
            } else {
                // Jika package_id dalam data booking adalah null, tampilkan produk dengan package_id null saja
                $query->whereNull('package_id');
            }
        })->get();

        return view('admin.order.detail.create', [
            'title' => 'Tambah Detail Pemesanan',
            'order' => $order,
            'products' => $products,
            'headers' => $this->headers
        ]);
    }

    public function add(Request $request, Order $order, Detail $detail)
    {
        // Pastikan Detail yang diberikan benar-benar milik Order yang sesuai
        if ($detail->order_id !== $order->id) {
            return back()->withErrors(['detail' => 'Detail tidak valid untuk pesanan ini']);
        }

        DB::transaction(function () use ($order, $detail) {
            $quantity = $detail->quantity + 1;
            $sub_total_price = $quantity * $detail->price;

            $detail->update([
                'quantity' => $quantity,
                'sub_total_price' => $sub_total_price
            ]);

            // Update total_price pada Order
            $order->update([
                'total_price' => $order->details->sum('sub_total_price') + $order->booking->package->price ?? 0
            ]);
        });

        return back()->with('success', 'Detail pesanan ditambahkan');
    }

    public function decrease(Request $request, Order $order, Detail $detail)
    {
        // Pastikan Detail yang diberikan benar-benar milik Order yang sesuai
        if ($detail->order_id !== $order->id) {
            return back()->withErrors(['detail' => 'Detail tidak valid untuk pesanan ini']);
        }

        DB::transaction(function () use ($order, $detail) {
            if ($detail->quantity > 1) {
                $quantity = $detail->quantity - 1;
                $sub_total_price = $quantity * $detail->price;
                $detail->update([
                    'quantity' => $quantity,
                    'sub_total_price' => $sub_total_price
                ]);
            } else {
                $detail->delete();
            }

            // Update total_price pada Order
            $order->update([
                'total_price' => $order->details->sum('sub_total_price') + $order->booking->package->price ?? 0
            ]);
        });

        return back()->with('success', 'Detail pesanan diperbarui');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|exists:products,id',
            'item' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
        ], [], [
            'order_id' => 'pemesanan',
            'product_id' => 'produk',
            'item' => 'barang',
            'quantity' => 'jumlah',
            'price' => 'harga',
        ]);

        // Penanganan Order ID
        $order_id = $request->order_id ?? $order->id;

        // Mencari Product
        $product = Product::find($request->product_id);

        // Pastikan produk ditemukan jika product_id ada
        if ($request->has('product_id') && !$product) {
            return redirect()->back()->withErrors(['product_id' => 'Produk tidak ditemukan']);
        }

        $price = $request->price ?? $product->price ?? 0;

        // Pengambilan Nilai Default Item
        $item = $request->item ?? ($product ? $product->name : 'Tidak diketahui');

        $detail = Detail::where('order_id', $order_id)->where('product_id', $request->product_id)->first();

        if (!$detail) {
            $quantity = $request->quantity;
            $sub_total_price = $quantity * $price;

            // Membuat Detail baru
            Detail::create([
                'order_id' => $order_id,
                'product_id' => $request->product_id,
                'item' => $item,
                'quantity' => $quantity,
                'price' => $price,
                'sub_total_price' => $sub_total_price,
            ]);
        } else {
            $quantity = $detail->quantity + $request->quantity;
            $sub_total_price = $quantity * $price;
            $detail->update([
                'quantity' => $quantity,
                'sub_total_price' => $sub_total_price
            ]);
        }

        // Update total_price pada Order
        $order->update([
            'total_price' => $order->details->sum('sub_total_price') + $order->booking->package->price ?? 0
        ]);

        return redirect("/admin/order/$order->id/detail")->with('success', 'Data Detail Pemesanan berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(Order $order, Detail $detail)
    {
        $this->addDynamicHeader($order);
        return view('admin.order.detail.show', [
            'title' => 'Detail',
            'order' => $order,
            'detail' => $detail,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, Detail $detail)
    {
        $this->addDynamicHeader($order);
        return view('admin.order.detail.edit', [
            'title' => 'Edit Detail',
            'order' => $order,
            'detail' => $detail,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, Detail $detail)
    {
        $validatedData = $request->validate([
            'product_id' => 'nullable',
            'item' => 'nullable',
            'quantity' => 'required',
            'price' => 'nullable',
        ], [], [
            'product_id' => 'produk',
            'item' => 'barang',
            'quantity' => 'jumlah',
            'price' => 'harga',
        ]);

        // Mencari Product
        $product = Product::find($request->product_id);
        $price = $request->price ?? $product->price;

        // Pengambilan Nilai Default Item
        $item = $request->item ?? ($product ? $product->name : $detail->item);

        $quantity = $request->quantity;
        $sub_total_price = $quantity * $price;

        // Membuat Detail baru
        $detail->update([
            'product_id' => $request->product_id,
            'item' => $item,
            'quantity' => $quantity,
            'price' => $price,
            'sub_total_price' => $sub_total_price,
        ]);

        // Update total_price pada Order
        $order->update([
            'total_price' => $order->details->sum('sub_total_price') + $order->booking->package->price ?? 0
        ]);

        return redirect("/admin/order/$order->id/detail")->with('success', 'Data Detail Pemesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, Detail $detail)
    {
        $detail->delete();
        $order->update([
            'total_price' => $order->details->sum('sub_total_price') + $order->booking->package->price ?? 0
        ]);
        return redirect("/admin/order/$order->id/detail")->with('success', 'Data Detail Pemesanan berhasil dihapus');
    }
}
