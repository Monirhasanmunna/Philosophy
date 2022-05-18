<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'roles_id' => '1',
            'name' => 'munna',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11111111'),
        ]);

        User::insert([
            'roles_id' => '2',
            'name' => 'sakib',
            'email' => 'author@gmail.com',
            'password' => bcrypt('11111111'),
        ]);

        User::insert([
            'roles_id' => '2',
            'name' => 'afrin',
            'email' => 'afrin@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
    }
}
