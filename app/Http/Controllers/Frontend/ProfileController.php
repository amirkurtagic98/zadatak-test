<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function addBook(Request $request)
    {
        $book_id = $request->input('book_id');

        if(Auth::check())
        {
            $book_check = Book::where('id', $book_id)->first();

            if($book_check)
            {
                if(Profile::where('book_id', $book_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $book_check->name . " Already Added to Profile!"]);
                }
                else
                {
                    $profileItem = new Profile();
                    $profileItem->book_id = $book_id;
                    $profileItem->user_id = Auth::id();
                    $profileItem->save();
                    return response()->json(['status' => $book_check->name . " Added to Profile!"]);
                }
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue!"]);
        }
    }

    public function viewprofile() 
    {
        $profileItems = Profile::where('user_id', Auth::id())->get();
        return view('frontend.profile', compact('profileItems'));
    }
}
