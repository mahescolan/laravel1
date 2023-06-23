<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employee;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        employee::create([
            'name' => 'kumar',
            'address' => 'south',
            'status'=>1,
            'dob'=>'2000-05-11'


        ]);
        employee::create([
            'name' => 'mahes',
            'address' => 'east',
            'status'=>2,
            'dob'=>'2002-11-11'


        ]);
      
    }
}
