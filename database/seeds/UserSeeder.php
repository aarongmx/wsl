<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'aaron@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Aarón Gómez Méndez'
        ]);
    }
}
