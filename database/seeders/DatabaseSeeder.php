<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'name' => 'admin@admin.com',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@admin.com'),
                'is_admin' => 1
            ]
        );
        User::factory(10)->create();
        Quiz::factory(10)->create();


    }
}
