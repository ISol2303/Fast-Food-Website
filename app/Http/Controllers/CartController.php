<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem; // Ensure this model exists and is correctly namespaced
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    /**
     * Add an item to the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($id)
    {
        // Retrieve the menu item (throws 404 if not found)
        $item = MenuItem::findOrFail($id);

        // Retrieve the current cart from the session (or an empty array if it doesn't exist)
        $cart = session()->get('cart', []);

        // If the item already exists in the cart, increment its quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Otherwise, add the item with a quantity of 1
            $cart[$id] = [
                'name'     => $item->name,
                'quantity' => 1,
                'price'    => $item->price,
                'image'    => $item->image_url,
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item added to cart successfully.');
    }

    /**
     * Display the shopping cart.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve the cart from the session (or an empty array if it doesn't exist)
        $cart = session()->get('cart', []);

        // Calculate the total price of items in the cart
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Return the cart view with cart items and the total price
        return view('cart', compact('cart', 'total'));
    }
}