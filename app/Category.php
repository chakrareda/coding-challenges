<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Category extends Model
{
     use FilterPaginateOrder;

    protected $fillable = [
        'name', 'parent_id',
    ];

    protected $filter = [
        'id', 'name', 'parent_id'
    ];

    public static function initialize()
    {
        return [
        	'name' => '', 'parent_id' => ''
        ];
    }

  public function children()
  {
    return $this->hasMany('App\Category', 'parent_id');
  }
}
