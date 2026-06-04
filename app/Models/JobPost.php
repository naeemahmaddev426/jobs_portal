<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts';
    protected $fillable = [
    'company_id',
    'job_category_id',
    'title',
    'slug',
    'description',
    'location',
    'salary',
    'experience',
    'job_type',
    'deadline',
    'status',
];

}
