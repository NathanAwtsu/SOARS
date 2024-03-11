<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'last_name',
        'middle_initial',
        'first_name',
        'email',
        'email_verified_at',
        'course_id',
        'organization1',
        'organization2',
        'password',
        'org1_member_status',
        'org2_member_status',
        'user_roles',
        'phone_number',
        'course_id',
    ];

}
