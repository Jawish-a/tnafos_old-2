<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Service extends Model
{
    //
    use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'services.serviceName' => 10,
            'services.serviceDescription' => 8,

        ],
    ];

    protected $fillable = ['unitPrice', 'total'];

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    public function estimates()
    {
        return $this->belongsToMany('App\Estimate')->withPivot('unitPrice', 'total');
    }

}
