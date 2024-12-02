<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'spaces';
    protected $fillable = [
        'space_name',
        'slug',
        'image',
        'status',
        'priority',
        'meta_keyword',
        'meta_description',
        'image_alt'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
