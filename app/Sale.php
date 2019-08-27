<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id','user_id','purchase_date'];

    public function product(){
        return $this->belongsTo(\App\Product::class,'product_id');
    }
    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
