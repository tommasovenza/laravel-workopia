<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jobs = [
            "Full Stack Developer",
            "Front End Developer",
            "Database Admin",
        ];

        foreach ($jobs as $key => $job) {
            # code...
            $new_job = new Listing();
            $new_job->job_title = $job;
            $new_job->job_description = $job;
            $new_job->save();
        }
    }
}
