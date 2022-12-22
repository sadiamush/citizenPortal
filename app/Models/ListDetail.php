<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_name',
        'list_table',
        'list_value',
     ];

     public function citizens()
     {
         return $this->belongsToMany(Citizen::class,'citizen_departments','citizen_id','department_id');
     }

}
