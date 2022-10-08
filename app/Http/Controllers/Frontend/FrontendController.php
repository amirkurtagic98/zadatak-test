<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_books = Book::all();
        return view('frontend.index', compact('featured_books'));
    }

    public function bookview($slug) 
    {
        $books = Book::where('slug', $slug)->first();
        $ratings = Rating::where('book_id', $books->id)->get();
        $rating_sum = Rating::where('book_id', $books->id)->sum('stars_rated');
        $user_rating = Rating::where('book_id', $books->id)->where('user_id', Auth::id())->first();
        $reviews = Review::where('book_id', $books->id)->get();
        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum / $ratings->count();
        }
        else
        {
            $rating_value = 0;
        }

        return view('frontend.books.view', compact('books', 'ratings', 'rating_value', 'user_rating', 'reviews'));   
    }

}
