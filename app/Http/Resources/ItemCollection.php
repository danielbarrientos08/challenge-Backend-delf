<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{
    public $collects = ItemResource::class;


    public function toArray($request)
    {
        return [
            'items' => $this->collection,
            'pagination' => new PaginationResource($this),
        ];

    }
}
