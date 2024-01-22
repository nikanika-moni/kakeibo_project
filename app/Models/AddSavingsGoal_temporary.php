<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSavingsGoal_temporary extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'month',
        'savings',
    ];

    public function user_details()
    {
        return $this->hasMany(UserDetails::class, 'temporary_savings_id');
    }
}
