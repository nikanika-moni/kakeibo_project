<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;
    // public function user_details()
    // {
    //     return $this->hasMany(User_details::class, 'employment_id');
    // }

    public function user_details()
    {
        return $this->hasMany(UserDetails::class, 'employment_id');
    }
}
