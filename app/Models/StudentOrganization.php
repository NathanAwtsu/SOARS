<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym', 
        'logo', 
        'mission', 
        'vision', 
        'constitution_bylaws', 
        'letter_of_intent', 
        'advisers_info',
        'officers_info',
        'adviser_endorsement'
    ];
}
