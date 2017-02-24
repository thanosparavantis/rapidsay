<?php

namespace Forum\Http\Controllers\Home;

use Storage;
use Auth;
use Image;
use Forum\Post;
use Forum\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'changeFeedTab']);
    }

    public function show()
    {
        if (request()->ajax() && auth()->check())
        {
            $user = auth()->user();
            $feed = $user->getFeedPaginator();

            return response()->json([
                'html' => view('home.partials.feed.content', ['feed' => $feed])->render(),
                'end' => !$feed->hasMorePages(),
            ]);
        }
        else
        {
            if (auth()->check())
            {
                return view('home.feed');
            }
            else
            {
                return view('home.welcome');
            }
        }
    }

    public function changeFeedTab(Request $request)
    {
        $tab = $request->tab;

        if (!in_array($tab, [ 'trending', 'latest', 'subscriptions' ])) abort(404);

        $user = auth()->user();
        $user->feed_tab = $tab;
        $user->save();

        return response()->json(['OK']);
    }
}
