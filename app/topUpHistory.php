<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topUpHistory extends Model
{
    protected $fillable = ['amount','topUpDate','user_id'];
    public function user(){
        return $this->belongsTo(\App\User::class);
    }

}
