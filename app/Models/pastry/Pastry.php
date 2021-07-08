<?php

namespace App\Models\pastry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pastry extends Model
{
    use HasFactory;

    protected $fillable = [
        'pastry_name',
        'ingredients',
        'cost_1kg',
        'cost_2kg',
        'cost_3kg',
        'status',
        'in_stock',
        'created_by',
        'modified_by',
        'deleted_by'
    ];
}
