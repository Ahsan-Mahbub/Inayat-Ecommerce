<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'teams';
    protected $fillable = [
        'name',
        'designation',
        'slug',
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
