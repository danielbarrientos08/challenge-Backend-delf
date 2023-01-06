<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use App\Models\CategoryItem;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Item::factory(10)->create();

        $this->call(CategorySeeder::class);

        $categories = Category::all();

        Item::all()->each(function ($item) use ($categories) {

            $randomCategories = $categories->random(rand(1,2));

            foreach ($randomCategories as $key => $category) {
                $categoryItem = CategoryItem::create([
                    'category_id' => $category->id,
                    'item_id'     => $item->id,
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                ]);
            }
        });
    }
}
