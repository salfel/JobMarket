<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

function paginateArray($items, $perPage = 15, $page = null, $options = [], $path = '/'): LengthAwarePaginator
{
    $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    $paginator = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    $paginator->setPath($path);

    return $paginator->withQueryString();
}
