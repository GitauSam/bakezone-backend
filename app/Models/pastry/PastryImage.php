<?php

namespace App\Models\pastry;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'pastry_id', 
        'status', 
        'image_name', 
        'image_url', 
        'saved_image_name',
        'created_by',
        'modified_by',
        'deleted_by'
    ];
}
