<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function jump(Request $request)
    {
        $q = trim($request->input('q'));

        if ($q === '') {
            return back()->with('error', 'Masukkan nama atau slug produk.');
        }

        // 1. Cari berdasarkan slug
        $product = Product::where('slug', $q)->first();

        // 2. Jika tidak ditemukan, coba cari berdasarkan nama
        if (!$product) {
            $product = Product::where('name', 'like', "%{$q}%")->first();
        }

        // 3. Jika ketemu, redirect ke detail produk
        if ($product) {
            return redirect()->route('product.show', $product->slug);
        }

        // 4. Jika tetap tidak ditemukan
        return back()->with('error', 'Produk tidak ditemukan.');
    }
}
