<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookUserController extends Controller
{
    public function store(Request $request)
    {
        $book_id = $request->input('book_id');

        if(auth()->check())
        {
            $book_check = Book::find($book_id);

            if($book_check)
            {
                $exists = auth()->user()->books->contains($book_check->id);

                if(!$exists)
                {
                    auth()->user()->books()->attach($book_check->id, ['created_at' => now()]);
                    return redirect()->back()->with(['status' => $book_check->name . " added to Profile!"]);       
                }
                else
                {
                    return redirect()->back()->with(['status' => $book_check->name . " already added to Profile!"]);
                }
            }
        }
        else
        {
            return redirect()->back()->with(['status' => "Login to Continue!"]);
        }
    }   
}
