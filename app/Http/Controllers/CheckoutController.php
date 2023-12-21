<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Book;
use Illuminate\View\View;

class CheckoutController extends Controller
{
   /* public function checkout()
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $id => $item) {
            $book = Book::find($id);

            if ($book) {
                // Save book information to the checkouts table
                $checkout = new Checkout([
                    'book_id' => $book->id,
                    'name' => $book->name,
                    'price' => $book->price,
                    'category' => $book->category,
                ]);

                $checkout->save();
            }
        }

        // Clear the cart after checkout
        session()->forget('cart');

        return redirect()->route('products')->with('success', 'Checkout successful!');
    }*/

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);

        return view('checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $total = $request->input('total_amount');

        // ... (other processing logic if needed)

        return view('stripe')->with([
            'billingDetails' => $request->only(['name', 'address', 'country', 'city', 'zip_code', 'phone']),
            'cartDetails' => $cart,
            'totalAmount' => $total,
        ]);
    }


    private function calculateTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }
}
