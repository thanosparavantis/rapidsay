<?php

namespace Forum\Http\Controllers\Home;

use Forum\User;
use Forum\Post;
use Forum\SearchResult;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Forum\Http\Controllers\Controller;
use Forum\Http\Requests\Home\SearchRequest;

class ExploreController extends Controller
{
    public function show()
    {
        if (request()->ajax())
        {
            return $this->getDefaultJsonResponse();
        }
        else
        {
            return view('home.explore');
        }
    }

    private function getDefaultJsonResponse()
    {
        $results = new SearchResult(null, [User::getDefaultSearchResults(), Post::getDefaultSearchResults()]);
        $paginator = $results->getPaginatedResults();

        return response()->json([
            'html' => view('home.partials.explore.content', ['results' => $paginator])->render(),
            'end' => !$paginator->hasMorePages(),
        ]);
    }

    public function search(SearchRequest $request)
    {
        $query = $request->get('query');

        if (!isset($query) || $query == "")
        {
            return $this->getDefaultJsonResponse();
        }
        else
        {
            return $this->getSearchJsonResponse($query);
        }
    }

    private function getSearchJsonResponse($searchQuery)
    {
        $results = new SearchResult($searchQuery, [User::getSearchResults($searchQuery), Post::getSearchResults($searchQuery)]);
        $paginator = $results->getPaginatedResults();
        $count = $results->getTotal();

        return response()->json([
            'query' => $searchQuery,
            'count' => $count,
            'html' => view('home.partials.explore.content', ['results' => $paginator])->render(),
            'end' => !$paginator->hasMorePages(),
        ]);
    }
}
