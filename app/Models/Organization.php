<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'id',
        'requirement_status',
        //27
        'name',
        'nickname',
        'type_of_organization',
        'mission',
        'vision',
        'logo',
        'consti_and_byLaws',
        'letter_of_intent',
        'adviser_name',
        'adviser_email',
        'ausg_rep_studno',
        'ausg_rep_name',
        'president_studno',
        'president_name',
        'vp_internal_studno',
        'vp_internal_name',
        'vp_external_studno',
        'vp_external_name',
        'secretary_studno',
        'secretary_name',
        'treasurer_studno',
        'treasurer_name',
        'auditor_studno',
        'auditor_name',
        'pro_studno',
        'pro_name',
        'admin_endorsement'
    ];
}
