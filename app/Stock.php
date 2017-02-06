<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable=[
        'customer_id',
        'symbol',
        'name',
        'shares',
        'purchase_price',
        'purchased',
        'original_value',

    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
