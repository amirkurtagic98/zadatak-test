<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\File;

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
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/book/', $filename);
            $book->image = $filename;
        }

        $book->name = $request->input('name');
        $book->slug = $request->input('slug');
        $book->published = $request->input('published');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
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
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/book/' . $book->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/book/', $filename);
            $book->image = $filename;
        }
        
        $book->name = $request->input('name');
        $book->slug = $request->input('slug');
        $book->published = $request->input('published');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->update();

        return redirect('books')->with('status', 'Book Updated Successfully!');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if($book->image)
        {
            $path = 'assets/uploads/book/' . $book->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
    
        $book->delete();

        return redirect('books')->with('status', 'Book Deleted Successfully!');
    }
}
