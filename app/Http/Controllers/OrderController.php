<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /** Tampilkan daftar pesanan */
    public function index()
    {
        $orders = Order::with(['customer','items.product'])
                       ->latest()->paginate(10);

        return view('dashboard.orders.index', compact('orders'));
    }

    /** Update status & tracking number */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status'          => 'required|in:diterima,diproses,dikirim',
            'tracking_number' => 'nullable|required_if:status,dikirim',
        ]);

        $order->update($data);

        return back()->with('success','Status pesanan diperbarui');
    }
}
