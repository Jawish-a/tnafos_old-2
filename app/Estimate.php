<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = ['number', 'uuid','date','expiryDate', 'status','notes','terms', 'unitPrice', 'total'];
    //
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function client()
    {
        return $this->hasOne('App\Company', 'client_id');
    }
    public function services()
    {
        return $this->belongsToMany('App\Service')->withPivot('unitPrice', 'total');
    }
}
