<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart page.
     */
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $products = [];
        $total = 0;

        // Get product details for cart items
        foreach ($cartItems as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $products[$id] = $product;
                $total += $product->price * $details['quantity'];
            }
        }

        return view('cart', [
            'cartItems' => $cartItems,
            'products' => $products,
            'total' => $total
        ]);
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        // Get the current cart
        $cart = session()->get('cart', []);
        
        // Add or update cart item
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $quantity
            ];
        }
        
        // Store updated cart in session
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;
        
        // Get the current cart
        $cart = session()->get('cart', []);
        
        // Update quantity if item exists
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated!');
        }
        
        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart!');
        }
        
        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    /**
     * Clear the entire cart.
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }
} 