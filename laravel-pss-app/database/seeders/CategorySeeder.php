<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic gadgets and accessories',
                'created_by' => 1
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing and accessories',
                'created_by' => 1
            ],
            [
                'name' => 'Home & Living',
                'description' => 'Home appliances and accessories',
                'created_by' => 2
            ],
            [
                'name' => 'Health & Beauty',
                'description' => 'Health and beauty products',
                'created_by' => 3
            ],
            [
                'name' => 'Books',
                'description' => 'Books and stationery',
                'created_by' => 1
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Sports and outdoor equipment',
                'created_by' => 1
            ],
            [
                'name' => 'Automotive',
                'description' => 'Automotive parts and accessories',
                'created_by' => 2
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Toys and games for kids',
                'created_by' => 3
            ],
            [
                'name' => 'Groceries',
                'description' => 'Groceries and food items',
                'created_by' => 1
            ],
            [
                'name' => 'Movies & Music',
                'description' => 'Movies and music CDs',
                'created_by' => 2
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
