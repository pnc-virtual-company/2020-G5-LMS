<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Position extends Model
{
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    public function user(){
        return $this->hasMany(User::class);
    }
    
}
