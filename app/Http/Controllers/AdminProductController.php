<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public $headers = [];

    public function __construct()
    {
        $this->headers = [
            [
                'href' => '/admin/product',
                'slot' => 'Data Produk'
            ],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'title' => 'Data produk',
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'Tambah Produk',
            'packages' => Package::all(),
            'headers' => $this->headers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'package_id' => 'nullable',
            'name' => 'required',
            'type' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:3145728',
        ], [], [
            'package_id' => 'paket',
            'name' => 'nama produk',
            'type' => 'tipe',
            'description' => 'deskripsi',
            'price' => 'harga',
            'image' => 'gambar',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product-image');
            $validateData['image'] = $path;
        }
        Product::create($validateData);

        return redirect("/admin/product")->with('success', 'Data Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'title' => 'Detail Produk',
            'product' => $product,
            'headers' => $this->headers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Sunting Produk',
            'packages' => Package::all(),
            'product' => $product,
            'headers' => $this->headers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'package_id' => 'nullable',
            'name' => 'required',
            'type' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|integer',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:3145728',
        ], [], [
            'package_id' => 'paket',
            'name' => 'nama produk',
            'type' => 'tipe',
            'description' => 'deskripsi',
            'price' => 'harga',
            'image' => 'gambar',
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product-image');
            $validateData['image'] = $path;
        }
        $product->update($validateData);

        return redirect("/admin/product")->with('success', 'Data Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect("/admin/product")->with('success', 'Data Produk berhasil dihapus');
    }
}
