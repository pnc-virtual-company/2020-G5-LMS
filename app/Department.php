<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    protected $fillable = [
        'department', 'user_id',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
