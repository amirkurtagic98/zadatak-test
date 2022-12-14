<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::sortable()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

}
