<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $table = "job_listings";

    protected $fillable = [
        "user_id",
        "title",
        "description",
        "salary",
        "job_type",
        "remote",
        "requirements",
        "benefits",
        "tags",
        "address",
        "city",
        "state",
        "zipcode",
        "contact_email",
        "contact_phone",
        "company_name",
        "company_description",
        "company_logo",
        "company_website",
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    // return all users that has marked this job
    public function ownerUsers()
    {
        return $this->belongsToMany(User::class, 'listing_user', 'job_listing_id', 'user_id')
            ->withTimestamps();
    }

    // a job has many applicants
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'job_listing_id');
    }
}
