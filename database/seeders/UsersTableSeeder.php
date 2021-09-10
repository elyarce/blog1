<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ely',
            'email' => 'elyarce@gmail.com',
            'password' => bcrypt('123456')
        ]);

        //factory(User::class, 10)->create();
        User::factory()->count(10)->create();
    }
}
