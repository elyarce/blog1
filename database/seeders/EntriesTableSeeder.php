<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entry;
use App\Models\User;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Entry::factory()->count(20)->create();

        $users = User::all();
        $users->each(function ($user){
            Entry::factory()->count(5)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
