<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['categoryName', 'categoryDescription', 'categoryIcon', 'categoryImage', 'parent_id'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
