<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
     'first_name',
     'last_name',
      'email',
      'mobile_no',
      'country_code',
      'address',
      'gender',
      'hobby',
      'photo',
    ];

    protected $casts = [
        'hobby' => 'array',
    ];
}
