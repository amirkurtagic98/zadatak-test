<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($book_slug)
    {
        $book = Book::where('slug', $book_slug)->first();

        if($book)
        {
            $book_id = $book->id;
            $review = Review::where('user_id', Auth::id())->where('book_id', $book_id)->first();
            if($review)
            {
                return view('frontend.reviews.edit', compact('review'));
            }
            else
            {            
                return view('frontend.reviews.index', compact('book'));
            }
        }
        else
        {
            return redirect()->back()->with()('status', "The link you followed was broken!");
        }
    }

    public function create(Request $request)
    {
        $book_id = $request->input('book_id');
        $book = Book::where('id', $book_id)->first();

        if($book)
        {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
                'user_review' => $user_review
            ]);

            $book_slug = $book->slug;
            if($new_review)
            {
                return redirect('books/'.$book_slug)->with('status', "Thank you for writing a review!");
            }
        }
        else
        {
            return redirect()->back()->with()('status', "The link you followed was broken!");
        }
    }

    public function edit($book_slug)
    {
        $book = Book::where('slug', $book_slug)->first();
        if($book)
        {
            $book_id = $book->id;
            $review = Review::where('user_id', Auth::id())->where('book_id', $book_id)->first();
            if($review)
            {
                return view('frontend.reviews.edit', compact('review'));
            }
            else
            {
                return redirect()->back()->with()('status', "The link you followed was broken!");
            }
        }
        else
        {
            return redirect()->back()->with()('status', "The link you followed was broken!");
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if($user_review != '')
        {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if($review)
            {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('books/'.$review->book->slug)->with('status', "Review updated successfully!");
            }
            else
            {
                return redirect()->back()->with()('status', "The link you followed was broken!");
            }
        }
        else
        {
            return redirect()->back()->with()('status', "You cannot submit an empty review!");
        }
    }
}
