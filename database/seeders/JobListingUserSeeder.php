<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobListingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jobs = Job::all();
        $users = User::all();

        for ($i = 0; $i < 10; $i++) {

            DB::table('listing_user')->insert([
                "job_listing_id" => $jobs[rand(1, 10)]->id,
                "user_id" => $users[rand(1, 10)]->id
            ]);
        }
    }
}
