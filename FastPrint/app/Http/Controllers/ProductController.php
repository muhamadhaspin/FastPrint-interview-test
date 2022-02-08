<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function api()
    {
        $products = Http::get('https://gist.githubusercontent.com/FastPrintProg3/dec91c65f573d09a6e7836c65ae54e73/raw')->json();

        foreach ($products as $product) {
            Product::create([
                'nama_produk' => $product['nama_produk'],
                'kategori' => $product['kategori'],
                'harga' => $product['harga'],
                'status' => $product['status'],
            ]);
        }

        return redirect(route('products.index'));
    }

    public function index()
    {
        $products = Product::where('status', '=', 'bisa dijual')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        Product::create($validated);

        return redirect(route('products.index'))->with('success', 'Produk Berhasil Di Tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        $product->update($validated);

        return redirect(route('products.index'))->with('success', 'Produk Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'))->with('success', 'Produk Berhasil Di Hapus!');
    }
}
