<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        Category::factory()->count(30)->create();
        User::factory()
            ->count(10)
            ->has(
                Order::factory()
                    ->count(3)
                    ->hasAttached(
                        Product::factory()
                        ->count(5),
                        [
                            'total_price' => rand(10000, 15000),
                            'total_quantity' => rand(1, 3)
                        ]
                    )
            )
            ->create();
    }
}
