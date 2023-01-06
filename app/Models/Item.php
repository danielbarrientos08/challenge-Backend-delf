<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    use HasFactory;

    protected $table      = 'item';
    protected $primaryKey = 'id';
    public $timestamps    = true;

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    /**relations */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_item','item_id','category_id');
    }
    /**Scopes */
    public function scopeName($query,$value)
    {
        if ($value!= '')
            return $query->where('name','like', '%'.$value.'%');
    }

    public function scopeDescription($query,$value)
    {
        if ($value!= '')
            return $query->where('description','like', '%'.$value.'%');
    }

    public function scopeStatus($query,$value)
    {
        if ($value!= '')
            return $query->where('status',$value);
    }
}
