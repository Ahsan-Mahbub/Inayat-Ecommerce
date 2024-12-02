<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = 'dealers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
    ];
}
