<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Admin',
                'email' => 'admin@jokikuy20.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
        );
        foreach($data AS $d){
            User::create([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
    }
}