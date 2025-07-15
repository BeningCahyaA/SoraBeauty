<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []); 
        $total = collect($cart)
            ->sum(fn($item) => $item['price'] * $item['qty']);

        return view('web.checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'total' => 'required|string',
        ]);

        Session::forget('cart');

        return redirect()->route('products.index')->with('success', 'Pembayaran selesai, tunggu pesananmu datang!');
    }
}
