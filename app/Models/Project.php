<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'projects';
    protected $fillable = [
        'project_name',
        'size',
        'details',
        'company_name',
        'location',
        'link',
        'website',
        'slug',
        'image',
        'status',
        'priority',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
