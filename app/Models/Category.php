<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'categories';
    protected $fillable = [
        'category_name',
        'slug',
        'image',
        'status',
        'priority',
        'article_title',
        'article',
        'meta_keyword',
        'meta_description',
        'image_alt'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function product(){
        return $this->hasMany(Product::class,'category_id')->active();
    }

}
