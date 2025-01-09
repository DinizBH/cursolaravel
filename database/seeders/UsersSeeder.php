<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName'=>'Giovane',
            'lastName'=>'Diniz',
            'email'=>'contato@giovanediniz.com.br',
            'password'=>bcrypt('12345678'),
        ]);
    }
}
