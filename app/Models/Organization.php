<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'id',
        'requirement_status',
        'name',
        'nickname',
        'type_of_organization',
        'mission',
        'vision',
        'logo',
        'consti_and_byLaws',
        'letter_of_intent',
        'adviser_info',
        'officer_info',
        'admin_endorsement'
    ];
}
