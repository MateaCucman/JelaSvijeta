<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}

public function withResponse($request, $response)
    {
        $data = $response->getData(true);
        $currentPage = $data['meta']['current_page'];
        $totalItems = $data['meta']['total'];
        $itemsPerPage = $data['meta']['per_page'];
        $totalPages = $data['meta']['last_page'];
        
        $prev = $data['links']['prev'];
        $next = $data['links']['next'];
        $self = $request->fullUrl();

        $data['meta'] = compact('currentPage', 'totalItems', 'itemsPerPage', 'totalPages');
        $data['links'] = compact('prev', 'next', 'self');

        $response->setData($data);
    }
