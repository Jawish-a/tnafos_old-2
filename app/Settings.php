<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = ['optionName', 'optionValue'];

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
