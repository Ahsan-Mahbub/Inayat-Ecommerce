<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'videos';
    protected $fillable = [
        'category_id',
        'title',
        'link',
        'status',
        'priority'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category(){
        return $this->belongsTo(VideoCategory::class,'category_id');
    }
}
