<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin Dotcom',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('mmmmmm'),
            'is_admin' => 1
        ]);

        \App\Models\User::factory(10)->create();

        Blog::factory(10)->create();
    }
}
