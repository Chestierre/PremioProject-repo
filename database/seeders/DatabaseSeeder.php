<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Chester',
            'password' => Illuminate\Support\Facades\Hash::make('premiotest'),
            'is_permission' => '1'
        ]
        

        )
        // \App\Models\User::factory(10)->create();
    }
}
