<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizen_id',
        'department_id',
     ];
}
