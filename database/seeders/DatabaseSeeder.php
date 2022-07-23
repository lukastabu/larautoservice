<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'algis',
            'email' => 'algis'.'@gmail.com',
            'password' => Hash::make('algis'), 
            'role' => 5,
        ]);

        DB::table('users')->insert([
            'name' => 'bronius',
            'email' => 'bronius'.'@gmail.com',
            'password' => Hash::make('bronius'),
        ]);

    }
}
