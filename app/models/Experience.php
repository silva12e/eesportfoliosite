<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company_name',
        'job_role',
        'description',
        'job_img',
        'date_from',
        'date_to'
    ];
}
