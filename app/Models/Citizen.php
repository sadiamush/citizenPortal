<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'network_id',
        'department_id',
        'education_id',
    ];

    public function listDetails()
    {
        return $this->belongsToMany(ListDetail::class,'citizen_departments','citizen_id','department_id');
    }
}
