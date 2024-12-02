<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'stocks';
    protected $fillable = [
        'product_id',
        'color',
        'watt',
        'temperature',
        'dimmable_type',
        'quantity',
        'price'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
