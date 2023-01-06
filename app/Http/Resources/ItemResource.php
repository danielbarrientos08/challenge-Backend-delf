<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => (int) $this->id,
            'name'          => (string) $this->name,
            'description'   => (string) $this->description,
            'register_date' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'categories'    => (object) $this->categories,
        ];
    }
}
