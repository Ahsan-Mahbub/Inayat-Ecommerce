<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'clients';
    protected $fillable = [
        'client_name',
        'image',
        'status',
        'priority'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
