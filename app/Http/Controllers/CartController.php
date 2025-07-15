<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Binafy\LaravelCart\Models\Cart;
use \Binafy\LaravelCart\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    private $cart;

    public function index()
    {
        if (auth()->guard('customer')->check()) {
            $userId = auth()->guard('customer')->user()->id;
            $this->cart = Cart::firstOrCreate(['user_id' => $userId]);
        } else {
            // Redirect to login if not authenticated
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        return view('web.cart', ['cart' => $this->cart]);
    }

    public function add(Request $request)
    {
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Invalid input data.')
                ->withErrors($validator)
                ->withInput();
        }

        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Check if the product is available
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk produk ini.');
        }

        // Initialize the cart
        $this->cart = Cart::firstOrCreate(['user_id' => auth()->guard('customer')->user()->id]);

        // Create a new cart item
        $cartItem = new CartItem([
            'itemable_id' => $product->id,
            'itemable_type' => Product::class,
            'quantity' => $request->quantity,
        ]);

        // Save the cart item
        $this->cart->items()->save($cartItem);

        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    public function remove($id)
    {
        // Initialize the cart
        if (auth()->guard('customer')->check()) {
            $this->cart = Cart::firstOrCreate(['user_id' => auth()->guard('customer')->user()->id]);
        } else {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $product = Product::findOrFail($id);
        $this->cart->removeItem($product);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function update($id, Request $request)
    {
        // Initialize the cart
        if (auth()->guard('customer')->check()) {
            $this->cart = Cart::firstOrCreate(['user_id' => auth()->guard('customer')->user()->id]);
        } else {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $product = Product::findOrFail($id);

        if ($request->action == 'decrease') {
            $this->cart->decreaseQuantity($product);
        } else if ($request->action == 'increase') {
            $this->cart->increaseQuantity($product);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }
}
