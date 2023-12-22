<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\order;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        

         // Extract book IDs and names from the cart
    $bookData = collect($cart)->map(function ($item, $id) {
        return ['id' => $id, 'name' => $item['name']];
    });

    // Separate book IDs and names
    $bookIds = $bookData->pluck('id')->toArray();
    $bookNames = $bookData->pluck('name')->toArray();

        // Create an order in the database
        $order = Order::create([
            'book_id' => json_encode($bookIds), // Store book IDs as an array
            'book_name' => json_encode($bookNames), // Store book names as an array
            'name' => request()->input('name'), // Adjust as needed
            'address' => request()->input('address'), // Adjust as needed
            'country' => request()->input('country'), // Adjust as needed
            'city' => request()->input('city'), // Adjust as needed
            'ZIP' => request()->input('zip_code'), // Adjust as needed
            'phone' => request()->input('phone'), // Adjust as needed
            'status' => 'pending',
            'total' => $total,
        ]);

        return view('stripe', compact('cart', 'total', 'order'));
    }
    private function calculateTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);

        try {
            // Set up Stripe API key
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a charge
            $charge = Stripe\Charge::create([
                "amount" => $total * 100,
                "currency" => "lkr",
                "source" => $request->stripeToken,
                "description" => "Payment for books from yourwebsite.com."
            ]);

            
        // Retrieve order ID from the request
        $orderId = $request->input('order_id');

             // Update the order status
        $order = Order::find($orderId);
        $order->status = 'paid';
        
        $order->save();

        // Clear the cart after successful payment and order creation
        session()->forget('cart');

            

            Session::flash('success', 'Payment successful! Your order has been placed.');

            return back();
        } catch (\Exception $e) {
            // Handle payment failure
            // You may log the error and provide a user-friendly error message
            Session::flash('error', 'Payment failed. Please try again.');

            return back();
        }
    }
}
