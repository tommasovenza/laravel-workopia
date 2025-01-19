<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
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
}
