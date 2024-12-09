<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Insert data into the departments table
        DB::table('departments')->insert([
            ['name' => 'Sales and Marketing', 'created_at' => now()],
            ['name' => 'Application Development', 'created_at' => now()],
            ['name' => 'Human Resources', 'created_at' => now()],
            ['name' => 'Customer Support', 'created_at' => now()],
        ]);
    
        // Insert data into the designations table
        DB::table('designations')->insert([
            ['name' => 'Marketing Manager', 'created_at' => now()],
            ['name' => 'Mobile Application Developer', 'created_at' => now()],
            ['name' => 'HR Specialist', 'created_at' => now()],
            ['name' => 'Customer Support Executive', 'created_at' => now()],
        ]);
    
        // Insert data into the users table
        DB::table('users')->insert([
            [
                'name' => 'John Due',
                'fk_department' => 1, // Refers to 'Sales and Marketing'
                'fk_designation' => 1, // Refers to 'Marketing Manager'
                'phone_number' => '1234567890',
                'created_at' => now(),
            ],
            [
                'name' => 'Tommy Mark',
                'fk_department' => 2, // Refers to 'Application Development'
                'fk_designation' => 2, // Refers to 'Mobile Application Developer'
                'phone_number' => '9876543210',
                'created_at' => now(),
            ],
            [
                'name' => 'Alice White',
                'fk_department' => 3, // Refers to 'Human Resources'
                'fk_designation' => 3, // Refers to 'HR Specialist'
                'phone_number' => '4561237890',
                'created_at' => now(),
            ],
            [
                'name' => 'Robert Black',
                'fk_department' => 4, // Refers to 'Customer Support'
                'fk_designation' => 4, // Refers to 'Customer Support Executive'
                'phone_number' => '7894561230',
                'created_at' => now(),
            ],
        ]);
    }
    

}
