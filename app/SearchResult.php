<?php

namespace Forum;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class SearchResult
{
    const RESULTS_PER_PAGE = 20;
    private $query;
    private $data;

    public function __construct($query = null, $data)
    {
        $this->query = $this->parseQuery($query);
        $this->data = $this->mergeData($data);
    }

    public function getPaginatedResults()
    {
        $currentPage = Paginator::resolveCurrentPage();
        $path = Paginator::resolveCurrentPath();

        return new Paginator(
            $this->data->forPage($currentPage, self::RESULTS_PER_PAGE + 1),
            self::RESULTS_PER_PAGE,
            $currentPage,
            ['path' => $path]
        );
    }

    private function mergeData($data)
    {
        $merged = new Collection;

        foreach ($data as $items)
        {
            if ($items instanceof Collection)
            {
                foreach ($items as $item)
                {
                    $merged->push($item);
                }
            }
            else
            {
                $merged->push($items);
            }
        }

        return $merged;
    }

    private function parseQuery($query)
    {
        $length = strlen($query);

        if ($length > 1000) {
            abort(404);
        }

        return trim($query);
    }

    public function getTotal()
    {
        return $this->data->count();
    }
}
