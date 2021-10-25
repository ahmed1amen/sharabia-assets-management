<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name'=>'Ayman',
            'email'=>'ayman@admin.com',
            'password'=>bcrypt('123456'),
        ]);
        \App\Models\Employee::factory(20)->create();
        \App\Models\Client::factory(10)->create();
    }
}
