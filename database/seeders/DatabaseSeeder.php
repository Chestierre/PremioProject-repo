<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'username' => 'Chester',
            'password' => Hash::make('premiotest'),
            'userrole' => 'Super Admin'
        ]);

        User::create([
            'username' => 'Dondon',
            'password' => Hash::make('desmarkpremio'),
            'userrole' => 'Admin'
        ]
        
        );
        // \App\Models\User::factory(10)->create();
    }
}
