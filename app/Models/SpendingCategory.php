<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendingCategory extends Model
{
    use HasFactory;
    public function spending_label_intermediate()
    {
        return $this->hasMany(AddLabelRecord::class, 'spending_category_id');
    }
}
