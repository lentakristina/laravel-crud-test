<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}