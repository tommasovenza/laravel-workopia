<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data_tags = [
            ["tags" => "development,coding,java,python"],
            ["tags" => "marketing,advertising"],
            ["tags" => "web development,programming"],
            ["tags" => "data analysis,statistics"],
            ["tags" => "graphic design,creative"],
            ["tags" => "data science,machine learning"],
            ["tags" => "UX design,user research"],
            ["tags" => "digital marketing,SEO,analytics"],
            ["tags" => "product management,tech"],
            ["tags" => "IT support,networking"],
        ];

        // getting jobs from DB
        $jobs = DB::table('job_listings')->get();

        // Updating jobs 
        foreach ($jobs as $index => $job) {
            DB::table('job_listings')->select('tags')
                ->where('id', '=', $job->id)
                ->update([
                    'tags' => $data_tags[$index]["tags"],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
