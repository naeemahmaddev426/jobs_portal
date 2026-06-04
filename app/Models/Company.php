<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobPost;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'website',
        'location',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jobs()
    {
        return $this->hasMany(JobPost::class);
    }
}
