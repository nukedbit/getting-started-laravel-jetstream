<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            if(User::where('name', '=', 'Admin')->count() === 0) {
                \App\Models\User::insert([
                    [
                        'name' => 'Admin',
                        'email' => 'admin@localhost',
                        'email_verified_at' => now(),
                        'password' => Hash::make("admin@pwd23"), // password
                        'remember_token' => Str::random(10)
                    ]
                ]);
            }
            User::factory()->times(200)->create();
        }
    }
}
