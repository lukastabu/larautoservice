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
        DB::table('autoservices')->insert([
            'office' => 'Vilnius',
            'address' => 'Jogailos 3, Vilnius',
            'phone' => '123456789',
        ]);
        DB::table('autoservices')->insert([
            'office' => 'Kaunas',
            'address' => 'Mindaugo 2, Kaunas',
            'phone' => '987654321',
        ]);
        DB::table('mechanics')->insert([
            'name' => 'Jonas Jonaitis',
            'photo' => 'https://st.depositphotos.com/1010710/2197/i/110/depositphotos_21970219-stock-photo-auto-mechanic-working-on-a.jpg',
            'rating' => 5,
            'autoservice_id' => 1, 
        ]);
        DB::table('mechanics')->insert([
            'name' => 'Petras Petraitis',
            'photo' => 'https://www.coveralls.co.uk/mech1_s.jpg',
            'rating' => 4, 
            'autoservice_id' => 1, 
        ]);
        DB::table('repairs')->insert([
            'repair' => 'Oil Change',
            'price' => 11,
            'duration' => 1, 
            'autoservice_id' => 1, 
        ]);
        DB::table('repairs')->insert([
            'repair' => 'Tyre Mount',
            'price' => 20,
            'duration' => 2, 
            'autoservice_id' => 1, 
        ]);

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
