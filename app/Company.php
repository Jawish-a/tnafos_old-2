<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    //
    protected $fillable = [
        'companyName', 'companyType', 'companyCR', 'companyMainProducts', 'companyEstablishmentYear',
        'companyTotalEmployees', 'companyBusinessType', 'companyBio', 'companyTelephone',
        'companyFax', 'companyEmail', 'companyWebsite', 'companyPObox', 'companyCountry',
        'companyCity', 'companyAddress', 'companyLocation'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function estimates()
    {
        return $this->hasMany('App\Estimate');
    }
}
