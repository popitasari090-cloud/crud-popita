<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'study_program',
        'phone_number',
        'email',
    ];
}