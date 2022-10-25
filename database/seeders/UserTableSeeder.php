<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'      => 'Admin',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('password'),
            'handphone_number'=>'012-1289301',
            'type'      => User::ADMIN,
        ]);

        User::factory()->create([
            'name'      => 'John Doe',
            'email'     => 'john@example.com',
            'password'  => bcrypt('password'),
            'type'      => User::AGENT,
        ]);
        User::factory()->create([
            'name'      => 'Lily',
            'email'     => 'lily@example.com',
            'password'  => bcrypt('password'),
            'type'      => User::DEFAULT,
            'gender' => 'Female',
            'handphone_number' =>'017-2893983',
            'status' => 'Good',
        ]);
    }
}
