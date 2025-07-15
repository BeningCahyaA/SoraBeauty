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
    $cart = session('cart', []);
    $total = collect($cart)->sum(fn ($i) => $i['price'] * $i['qty']);

    // abaikan $request->total, pakai $total yang fresh
    session()->flash('checkout', [
        'customer_id' => auth('customer')->id(),
        'total'       => $total,
        'name'        => $request->name,
        'address'     => $request->address,
        'phone'       => $request->phone,
    ]);

        Session::forget('cart');

        return redirect()->route('products.index')->with('success', 'Pembayaran selesai, tunggu pesananmu datang!');
    }
}
