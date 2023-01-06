<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ItemService
{

    public function listItems(Request $request): Object {

        $categoryName = $request->category_name;

        $items = Item::status($request->status)
                    ->name($request->name)
                    ->description($request->description)
                    ->with('categories:id,name')
                    ->whereHas('categories', function(Builder $query) use ($categoryName){
                        $query->where('name','ilike','%'.$categoryName.'%');
                    })->paginate(5);

        return $items;
    }
}
