<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);       // array, default []
        $total = collect($cart)                 // ubah ke Collection
            ->sum(fn($item) => $item['price'] * $item['qty']);

        return view('web.checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'total' => 'required|string',
        ]);

        // Here you would typically handle the payment processing logic

        // Clear the cart after payment
        Session::forget('cart');

        return redirect()->route('products.index')->with('success', 'Pembayaran selesai, tunggu pesananmu datang!');
    }
}
