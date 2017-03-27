<?php

namespace Forum\Http\Controllers\Home;

use Auth;
use Forum\User;
use Illuminate\Http\Request;
use Forum\Http\Requests;
use Forum\Http\Controllers\Controller;

class CommunityController extends Controller
{
    public function show()
    {
        if (request()->ajax())
        {
            $users = User::getCommunityPaginator(auth()->check() && auth()->user()->admin); // Include banned users if the user is admin.

            return response()->json([
                'html' => view('home.partials.community.list', ['users' => $users])->render(),
                'debug' => $users,
                'end' => !$users->hasMorePages(),
            ]);
        }
        else
        {
            return view('home.community');
        }
    }
}
