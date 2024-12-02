<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = 'settings';
    protected $fillable = [
        'phone',
        'mobile',
        'email',
        'whatsapp_number',
        'fb_link',
        'twitter_link',
        'youtube_link',
        'linkedin_link',
        'instagram_link',
        'tiktok_link',
        'location',
        'about_details',
        'terms_details',
        'privacy_details',
        'messenger_script',
        'return_policy',
        'copyright',
        'title',
        'keyword',
        'description',
        'video1',
        'video2',
        'image',
        'google_map',
        'e_catalogue',
        'promo1',
        'promo2',
        'promo3',
        'promo4',
        'promo5',
        'head_script',
        'call_price',
    ];
}
