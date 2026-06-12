<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

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
public function company()
{
    return $this->belongsTo(Company::class);
}
public function applications()
{
    return $this->hasMany(JobApplication::class);
}


}
