<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordDetail extends Model
{
    use HasFactory;
    protected $table = 'record_detail';

    protected $fillable = [
        'spending_label_intermediate_id',
        'amount',
        'memo',
        'date',
    ];

    public function spending_label_intermediate()
    {
        return $this->belongsTo(AddLabelRecord::class, 'spending_label_intermediate_id');
    }

    // public function user_details()
    // {
    //     return $this->belongsTo(UserDetails::class, 'user_details_id');
    // }

    // public function record_detail()
    // {
    //     return $this->hasMany(RecordDetails::class, 'user_details_id');
    // }
}
