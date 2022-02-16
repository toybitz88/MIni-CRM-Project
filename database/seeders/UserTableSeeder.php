<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            
            'name' => 'Reyson',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60)
        ]);
    }
}
