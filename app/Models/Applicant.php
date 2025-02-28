<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_listing_id',
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path'
    ];

    // an applicant belongs to a job
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    // an applicatin belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
