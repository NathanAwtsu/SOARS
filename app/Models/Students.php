<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'last_name',
        'middle_initial',
        'first_name',
        'email',
        'course_id',
        'password',
        'member_status',
        'user_roles',
        'username',
        'phone_number'
    ];
}
