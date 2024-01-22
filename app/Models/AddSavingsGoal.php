<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSavingsGoal extends Model
{
    use HasFactory;

    protected $table = 'monthly_savings';


    protected $fillable = [
        // 'user_id',
        'savings',
    ];

    // public function user_details()
    // {
    //     return $this->hasOne(UserDetails::class, 'monthly_savings_id');
    // }
}
