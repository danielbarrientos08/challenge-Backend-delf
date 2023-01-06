<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => (int) $this->id,
            'name'        => (string) $this->name,
            'description' => (string) $this->description,
            'categories' =>  (object) $this->categories,
        ];
    }
}
