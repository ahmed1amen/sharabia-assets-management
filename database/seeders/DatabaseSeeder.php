<?php

namespace Database\Seeders;

use App\Models\ClientAsset;
use App\Models\MaintenanceRequest;
use Carbon\Carbon;
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
            'name' => 'Ayman',
            'email' => 'ayman@admin.com',
            'password' => bcrypt('123456'),
        ]);
        \App\Models\Employee::factory(1)->create();
        \App\Models\Client::factory(1)->create();

 MaintenanceRequest::create([

    "client_id" => 1,
    "total" => "450.00",
    "total_paid" => "50.00",
]);
        ClientAsset::insert([
            [
                "name" => "Laptop",
                "employee_id" => 1,
                "maintenance_request_id" => 1,
                "issue" => "Socket",
                "cost" => 50,
                "status" => 0,
                "delivery_date" => Carbon::now()->addDays(5),

            ],
            [

                "name" => "Playstation5",
                "employee_id" => 1,
                "maintenance_request_id" => 1,
                "issue" => "Software",
                "status" => 2,
                "cost" => 100,
                "delivery_date" => Carbon::now()->addDays(3),
            ],
            [
                "name" => "Joystick",
                "employee_id" => 1,
                "maintenance_request_id" => 1,
                "issue" => "Broken",
                "status" => 3,
                "cost" => 300,
                "delivery_date" => Carbon::now()->addDays(2),
            ]]
        );


    }
}
