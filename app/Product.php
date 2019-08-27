<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','discountPerc'];

    public function sales(){
        return $this->hasMany(\App\Sale::class);
    }
}
