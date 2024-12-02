<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'blogs';
    protected $fillable = [
        'blog_name',
        'slug',
        'short_details',
        'details',
        'image',
        'status',
        'meta_keyword',
        'meta_description',
        'image_alt',
        'priority'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
