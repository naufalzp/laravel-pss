<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Smartphone',
                'description' => 'Latest smartphone with advanced features',
                'price' => 3000000,
                'quantity' => 50,
                'category_id' => 1, // Electronics
                'supplier_id' => 1, // PT. Sumber Makmur
                'created_by' => 1
            ],
            [
                'name' => 'Laptop',
                'description' => 'High-performance laptop for work and gaming',
                'price' => 8000000,
                'quantity' => 30,
                'category_id' => 1, // Electronics
                'supplier_id' => 1, // PT. Sumber Makmur
                'created_by' => 1
            ],
            [
                'name' => 'Jeans',
                'description' => 'High-quality denim jeans',
                'price' => 150000,
                'quantity' => 100,
                'category_id' => 2, // Fashion
                'supplier_id' => 2, // PT. Sumber Rejeki
                'created_by' => 1
            ],
            [
                'name' => 'Sneakers',
                'description' => 'Stylish and comfortable sneakers',
                'price' => 500000,
                'quantity' => 80,
                'category_id' => 2, // Fashion
                'supplier_id' => 2, // PT. Sumber Rejeki
                'created_by' => 2
            ],
            [
                'name' => 'Sofa Set',
                'description' => 'Comfortable and stylish sofa set',
                'price' => 5000000,
                'quantity' => 20,
                'category_id' => 3, // Home & Living
                'supplier_id' => 3, // PT. Sumber Jaya
                'created_by' => 2
            ],
            [
                'name' => 'Dining Table',
                'description' => 'Modern dining table for family meals',
                'price' => 3000000,
                'quantity' => 25,
                'category_id' => 3, // Home & Living
                'supplier_id' => 3, // PT. Sumber Jaya
                'created_by' => 3
            ],
            [
                'name' => 'Skincare Set',
                'description' => 'Complete skincare set for glowing skin',
                'price' => 200000,
                'quantity' => 75,
                'category_id' => 4, // Health & Beauty
                'supplier_id' => 4, // PT. Sumber Bahagia
                'created_by' => 3
            ],
            [
                'name' => 'Hair Dryer',
                'description' => 'Professional hair dryer for salon-quality results',
                'price' => 500000,
                'quantity' => 40,
                'category_id' => 4, // Health & Beauty
                'supplier_id' => 4, // PT. Sumber Bahagia
                'created_by' => 1
            ],
            [
                'name' => 'Novel',
                'description' => 'Bestselling novel from popular author',
                'price' => 80000,
                'quantity' => 120,
                'category_id' => 5, // Books
                'supplier_id' => 5, // PT. Sumber Sejahtera
                'created_by' => 1
            ],
            [
                'name' => 'Cookbook',
                'description' => 'Collection of delicious recipes for home cooks',
                'price' => 100000,
                'quantity' => 90,
                'category_id' => 5, // Books
                'supplier_id' => 5, // PT. Sumber Sejahtera
                'created_by' => 2
            ],
            [
                'name' => 'Treadmill',
                'description' => 'Fitness treadmill for home exercise',
                'price' => 6000000,
                'quantity' => 10,
                'category_id' => 6, // Sports & Outdoors
                'supplier_id' => 6, // PT. Sumber Lancar
                'created_by' => 1
            ],
            [
                'name' => 'Camping Tent',
                'description' => 'Durable camping tent for outdoor adventures',
                'price' => 1000000,
                'quantity' => 15,
                'category_id' => 6, // Sports & Outdoors
                'supplier_id' => 6, // PT. Sumber Lancar
                'created_by' => 3
            ],
            [
                'name' => 'Car Battery',
                'description' => 'High-performance car battery',
                'price' => 800000,
                'quantity' => 30,
                'category_id' => 7, // Automotive
                'supplier_id' => 7, // PT. Sumber Jasa
                'created_by' => 2
            ],
            [
                'name' => 'Car Wash Kit',
                'description' => 'Complete car wash kit for a shiny finish',
                'price' => 500000,
                'quantity' => 50,
                'category_id' => 7, // Automotive
                'supplier_id' => 7, // PT. Sumber Jasa
                'created_by' => 2
            ],
            [
                'name' => 'Action Figure',
                'description' => 'Collectible action figure',
                'price' => 120000,
                'quantity' => 60,
                'category_id' => 8, // Toys & Games
                'supplier_id' => 8, // PT. Sumber Usaha
                'created_by' => 3
            ],
            [
                'name' => 'Board Game',
                'description' => 'Classic board game for family fun',
                'price' => 300000,
                'quantity' => 45,
                'category_id' => 8, // Toys & Games
                'supplier_id' => 8, // PT. Sumber Usaha
                'created_by' => 3
            ],
            [
                'name' => 'Organic Vegetables',
                'description' => 'Fresh organic vegetables',
                'price' => 50000,
                'quantity' => 200,
                'category_id' => 9, // Groceries
                'supplier_id' => 9, // PT. Sumber Maju
                'created_by' => 1
            ],
            [
                'name' => 'Instant Noodles',
                'description' => 'Popular instant noodles for a quick meal',
                'price' => 10000,
                'quantity' => 300,
                'category_id' => 9, // Groceries
                'supplier_id' => 9, // PT. Sumber Maju
                'created_by' => 1
            ],
            [
                'name' => 'Music Album',
                'description' => 'Latest music album from popular artist',
                'price' => 120000,
                'quantity' => 80,
                'category_id' => 10, // Movies & Music
                'supplier_id' => 10, // PT. Sumber Berkat
                'created_by' => 2
            ],
            [
                'name' => 'Movie DVD',
                'description' => 'Classic movie DVD for movie night',
                'price' => 50000,
                'quantity' => 100,
                'category_id' => 10, // Movies & Music
                'supplier_id' => 10, // PT. Sumber Berkat
                'created_by' => 2
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
