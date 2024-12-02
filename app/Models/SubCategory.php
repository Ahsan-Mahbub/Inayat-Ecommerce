<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'sub_categories';
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'slug',
        'status',
        'priority'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
