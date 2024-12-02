<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'video_categories';
    protected $fillable = [
        'category_name',
        'slug',
        'image',
        'status',
        'priority',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function video(){
        return $this->hasMany(Video::class,'video_id')->active();
    }
}
