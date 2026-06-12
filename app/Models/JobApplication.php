<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
     protected $fillable = [
        'user_id',
        'job_post_id',
        'cv',
        'cover_letter',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(JobPost::class,'job_post_id');
    }
}
