<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function employee_designation(){
    //     return $this->belongsTo(EmployeeDesignation::class, 'designation', 'id');
    // }
}