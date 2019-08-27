<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $fillable = ['amount','user_id'];

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
