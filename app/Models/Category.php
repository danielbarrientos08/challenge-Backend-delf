<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;

    protected $table      = 'category';
    protected $primaryKey = 'id';
    public $timestamps    = true;

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    /**relations*/
    public function items()
    {
        return $this->belongsToMany(Item::class,'category_item','item_id','category_id');
    }
}
