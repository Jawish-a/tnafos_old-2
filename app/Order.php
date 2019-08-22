<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['uuid', 'date','endDate', 'comments', 'company'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}
