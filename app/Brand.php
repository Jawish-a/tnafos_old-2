<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $filable = ['brandName', 'brandDescription', 'brandLogo'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
