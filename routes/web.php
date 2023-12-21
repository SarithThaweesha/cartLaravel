<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/items', [ItemController::class, 'index']);



Route::get('/', [BookController::class, 'index']);

Route::get('/book/{id}', [BookController::class, 'addBooktoCart'])->name('addbook.to.cart');
Route::get('/shopping-cart', [BookController::class, 'bookCart'])->name('shopping.cart');
Route::delete('/delete-cart-product', [BookController::class, 'deleteProduct'])->name('delete.cart.product');


// returns the form for adding a book
Route::get('/books/create', BookController::class . '@create')->name('books.create');
// adds a book to the database
Route::post('/books', BookController::class .'@addBook')->name('books.addBook');
// returns a page that shows a full book
Route::get('/books/{books}', BookController::class .'@show')->name('books.show');
// returns the form for editing a book
//Route::get('/books/{Book}/edit', BookController::class .'@edit')->name('books.edit');
// updates a book
Route::put('/books/{books}', [BookController::class, 'updateBook'])->name('books.updateBook');


// deletes a book
Route::delete('/books/{books}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/products', [BookController::class, 'index'])->name('products');

//Route::get('/books/{id}/edit', BookController::class .'@edit')->name('books.edit');
Route::get('/books/{id?}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::match(['get', 'post'], '/books/search', [BookController::class, 'searchBook'])->name('searchBook');

Route::get('/update', [BookController::class, 'updateB'])->name('updateBook');



Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');


Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

/*Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/process-checkout', [CheckoutController::class, 'processCheckout'])->name('process.checkout');*/

