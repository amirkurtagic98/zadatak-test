<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('book_rating');
        $book_id = $request->input('book_id');

        $book_check = Book::where('id', $book_id)->first();
        if($book_check)
        {
            $existing_rating = Rating::where('user_id', Auth::id())->where('book_id', $book_id)->first();
            if($existing_rating)
            {
                $existing_rating->stars_rated = $stars_rated;
                $existing_rating->update();
            }
            else
            {
                Rating::create([
                    'user_id' => Auth::id(),
                    'book_id' => $book_id,
                    'stars_rated' => $stars_rated
                ]);
            }

            return redirect()->back()->with('status', "Thank you for rating this product!");

        }
        else
        {
            return redirect()->back()->with('status', "The link you followed was broken!");
        }
    }
}
