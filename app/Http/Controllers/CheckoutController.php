<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Book;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function checkout()
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
    }
}
