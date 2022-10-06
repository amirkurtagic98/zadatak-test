<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function add()
    {
        return view('admin.book.add');
    }

    public function insert(Request $request)
    {
        $book = new Book();

        $book->name = $request->input('name');
        $book->published = $request->input('published');
        $book->author = $request->input('author');
        $book->save();

        return redirect('books')->with('status', 'Book Added Successfully!');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        
        $book->name = $request->input('name');
        $book->published = $request->input('published');
        $book->author = $request->input('author');
        $book->update();

        return redirect('books')->with('status', 'Book Updated Successfully!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
    
        $book->delete();

        return redirect('books')->with('status', 'Book Deleted Successfully!');
    }
}
