@extends('shop')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Checkout</h2>
        <form action="{{ route('stripe.post') }}" method="get">
            @csrf

            <!-- Billing Details Section -->
            <h3>Billing Details</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="zip_code">ZIP Code:</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

            <!-- Cart Details Section -->
            <h3>Cart Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['price'] }}</td>
                            <td>{{ $details['quantity'] * $details['price'] }}</td>
                        </tr>  
                    @endforeach
                    <tr>
                            <td></td>
                            <td></td>
                            <td><p>Total Amount: </p></td>
                            <td><p>Rs:{{ $total }}</p></td>
                        </tr>
                </tbody>
                
            </table>
<!-- Hidden input field for total amount -->
<input type="hidden" name="total_amount" value="{{ $total }}">

 <!-- Hidden input field for book IDs -->
    @foreach($cart as $id => $details)
        <input type="hidden" name="book_ids[]" value="{{ $id }}">
    @endforeach

<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary btn-lg ml-auto">Proceed to Pay</button>
</div>

        </form>
    </div>
@endsection

