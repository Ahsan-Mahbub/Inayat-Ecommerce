<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'testimonials';
    protected $fillable = [
        'testimonial_name',
        'designation',
        'details',
        'image',
        'status',
        'priority'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
