<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
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
            'products.productName' => 10,
        ],
    ];


    protected $fillable = [
        'productName', 'productDescription', 'productSku',
        'productBarcode', 'productVersion','productImage',
        'productEdition', 'productMinOrder', 'productWeight',
        'productDimensionsX', 'productDimensionsY', 'productDimensionsZ',
        'brand_id', 'category_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('qty');
    }
}
