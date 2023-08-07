<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

function paginateArray($items, $perPage = 15, $page = null, $options = [], $path = '/'): LengthAwarePaginator
{
    $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    $paginator = new LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page, $options);

    $paginator->setPath($path);

    return $paginator->withQueryString();
}

function sortByDate(array $array, string $key = 'created_at')
{
    usort($array, function ($a, $b) use ($key) {
        $a = $a[$key];
        $b = $b[$key];

        if ($a > $b) {
            return 1;
        } else {
            if ($a < $b) {
                return -1;
            } else {
                return 0;
            }
        }
    });

    return $array;
}
