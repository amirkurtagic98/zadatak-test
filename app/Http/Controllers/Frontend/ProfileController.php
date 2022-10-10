<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function viewprofile(Request $request) 
    {
        if(request()->has('month'))
        {
            $month = $request->input('month');
            $user = User::whereId(auth()->id())
            ->with('books', function($query) use ($month) {
                $query->whereMonth('book_user.created_at', $month);
            })
            ->first();
        }
        else 
        {
            $user = User::whereId(auth()->id())
            ->with('books')
            ->first();
        }

        //dd($user->toArray()); 
        
        return view('frontend.profile', compact('user'));
    }
}
