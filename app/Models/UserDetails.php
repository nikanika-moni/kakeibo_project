<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'employment_id',
        'net_income',
        'rent',
        'entertainment_expenses',
        'transportation_expenses',
        'food_expenses',
        'entertainment',
        'savings_so_far',
        'average_savings',
    ];

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'employment_id');
    }

    // public function record_detail()
    // {
    //     return $this->hasMany(RecordDetail::class,  'user_details_id');
    // }

    public function spending_label_intermediate()
    {
        return $this->hasMany(AddLabelRecord::class,  'user_details_id');
    }

    public function temporary_savings()
    {
        return $this->belongsTo(AddSavingsGoal_temporary::class, 'temporary_savings_id');
    }

    public function monthly_savings()
    {
        return $this->belongsTo(AddSavingsGoal::class, 'monthly_savings_id');
    }
}

