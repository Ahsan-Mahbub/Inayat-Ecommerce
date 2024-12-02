<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'banners';
    protected $fillable = [
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'status',
        'status2',
        'status3',
        'status4',
        'status5',
        'status6',
        'link',
        'link2',
        'link3',
        'link4',
        'link5',
        'link6',
    ];
}
