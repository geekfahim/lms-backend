<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Brand::factory(20)->create();
        \App\Models\Category::factory(30)->create();
        \App\Models\Unit::factory(30)->create();
        \App\Models\SubCategory::factory(100)->create();
        \App\Models\Product::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone'=>'01797371947',
            'password' => Hash::make('password'),
        ]);
    }
}
