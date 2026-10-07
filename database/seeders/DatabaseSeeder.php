<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Product::create([
            'name' => 'JBL',
            'price' => 10000,
            'description' => 'Speaker JBL'
        ]);

        Product::create([
            'name' => 'Sony',
            'price' => 20000,
            'description' => 'Speaker Sony'
        ]);

        Product::create([
            'name' => 'Samsung',
            'price' => 30000,
            'description' => 'Speaker Samsung'
        ]);
    }
}