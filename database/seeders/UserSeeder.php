<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Tommaso',
            'Ludovico',
            'Giordano',
            'Giacomo',
            'Eugenio',
            'Lorenzo',
            'Francesco',
            'Barbara',
            'Matteo',
            'Marco',
            'Chiara',
            'Natalya',
            'Irene',
            'Elia',
            'Andrea',
            'Claudia',
            'Giulio',
            'Irina',
        ];

        $surnames = [
            'Venza',
            'Luchetti',
            'Gentile',
            'Demurtas',
            'Benedetti',
            'Scali',
            'Sforazzini',
            'Iadarola',
            'Leoncini',
            'Battaglini',
            'Cacciante',
            'Fomina',
            'Giganti',
            'Bengasini',
            'Savelli',
            'Bernardi',
            'Lazzi',
            'Efimenko',
        ];

        // Truncate users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('job_listings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 20; $i++) {
            // create a fullname
            $full_name = $names[rand(0, 17)] . ' ' . $surnames[rand(0, 17)];
            $email = explode(" ", $full_name);

            // creating users
            DB::table('users')->insert([
                'name' => $full_name,
                'email' => strtolower($email[0]) . strtolower($email[1]) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
