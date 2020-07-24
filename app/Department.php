<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    protected $fillable = [
        'department',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
