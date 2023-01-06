<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemCollection;
use App\Services\ItemService;

class ItemController extends Controller
{
    private $itemService;

    public function __construct( ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(ItemRequest $request)
    {
        $items = $this->itemService->listItems($request);

        $items = new ItemCollection($items);

        return response()->api('success', $items, 200);
    }
}
