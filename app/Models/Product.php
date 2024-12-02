<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'space_id',
        'product_name',
        'product_code',
        'slug',
        'product_qnt',
        'price',
        'color',
        'size',
        'discount',
        'main_price',
        'temperature',
        'details',
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'image7',
        'image8',
        'status',
        'feature',
        'youtube_link',
        'meta_keyword',
        'meta_description',
        'image_alt',
        'image_alt2',
        'dimmable_type',
        'priority',
        'stock_status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
}
