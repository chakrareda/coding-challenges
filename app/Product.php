<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Product extends Model
{
     use FilterPaginateOrder;

    protected $fillable = [
        'category_id', 'name', 'description', 'price', 'image'
    ];
    protected $filter = [
        'id','category_id', 'name', 'description', 'price', 'image',

        // filter relation also, eg: category
        'category.id', 'category.name', 'category.parent_id', 'category.address', 'category.created_at'
    ];



    public static function initialize()
    {

        return [

            'category_id' => 'Select',
            'name' => 'Invoice for ',
            'description' => '',
            'image' => null,
            'price' => 0,
           
        ];
    }

    public function category()
    {
        return $this->belongsTo(Customer::class);
    }
}
