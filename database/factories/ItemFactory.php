<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => 'Product '.Str::random(10),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement($array = array (1,0))
        ];
    }
}
