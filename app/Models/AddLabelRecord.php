<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLabelRecord extends Model
{
    use HasFactory;

    protected $table = 'spending_label_intermediate';


    protected $fillable = [
        'user_details_id',
        'spending_category_id',
    ];

    public function record_detail()
    {
        return $this->hasMany(RecordDetail::class, 'spending_label_intermediate_id');
    }

    public function spending_category()
    {
        return $this->belongsTo(SpendingCategory::class, 'spending_category_id');
    }

    public function user_details()
    {
        return $this->belongsTo(UserDetails::class, 'users_id');
    }
}
