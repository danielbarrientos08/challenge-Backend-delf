<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'total'        => (int) $this->total(),
            'count'        => (int) $this->count(),
            'per_page'     => (int) $this->perPage(),
            'current_page' => (int) $this->currentPage(),
            'last_page'    => (int) $this->lastPage(),
        ];
    }
}
