<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('products',compact('books'));
    }

    public function addBooktoCart($id)
    {
        $book=Book::findOrFail($id);
        $cart=session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

        }else{
            $cart[$id]=[
                "name"=>$book->name,
                "quantity"=>1,
                "price"=>$book->price,
                "image"=>$book->image,

            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Book has been added to cart');
    }

    public function bookCart()
    {
        return view('cart');
    }

    public function deleteProduct(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Book successfully deleted!');
        }
    }
/*below are database controlling functions */
    public function addBook(Request $request)
  {
    $request->validate([
      //'id' => 'required|max:255',
      'name' => 'required',
      'author' => 'required',
      'image' => 'required',
      'price' => 'required',
      'category' => 'required',
    ]);
    Book::create($request->all());
    return redirect()->route('products')
      ->with('success', 'book added successfully into db.');
  }

  public function updateBook(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);

        $book = Book::find($id);

        if (!$book) {
            return redirect()->route('products')->with('error', 'Book not found');
        }

        $book->update($request->all());

        return redirect()->route('products')->with('success', 'Book updated successfully in db.');
    }

  public function destroy($id)
  {
    $book = Book::find($id);
    $book->delete();
    return redirect()->route('products')
      ->with('success', 'Book deleted successfully from db');
  }

  public function create()
  {
    return view('books.create');
  }

  public function show($id)
  {
    $book = Book::find($id);
    return view('Books.edit', compact('book'));
  }

  /*public function edit($id)
  {
    $book = Book::find($id);

    if (!$book) {
        // Handle the case where the book with the given ID is not found
        return redirect()->route('products')->with('error', 'Book not found');
    }

    return view('books.edit', compact('book'));
}*/
public function edit($id = null)
    {
        $book = $id ? Book::find($id) : new Book();

        if (!$book) {
            $book = new Book();
            $book->id = null; // Set id to null or any default value as needed
        }

        return view('books.edit', compact('book'));
    }


    public function searchBook(Request $request)
    {
        $request->validate([
            'search_id' => 'nullable|exists:books,id',
        ]);

        if ($request->has('search_id')) {
            $book = Book::find($request->input('search_id'));

            if ($book) {
                return view('books.edit', compact('book'));
            } else {
                return redirect()->route('books.edit')->with('error', 'Book not found');
            }
        }

        return redirect()->route('books.edit')->with('error', 'Invalid input for search');
    }


public function updateB()
  {
    return view('books.edit');
  }
}
