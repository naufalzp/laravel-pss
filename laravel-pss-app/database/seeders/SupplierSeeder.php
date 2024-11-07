<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT. Sumber Makmur',
                'contact_info' => 'Jl. Pahlawan No. 10, Jakarta',
                'created_by' => 1
            ],
            [
                'name' => 'PT. Sumber Rejeki',
                'contact_info' => 'Jl. Pahlawan No. 20, Jakarta',
                'created_by' => 1
            ],
            [
                'name' => 'PT. Sumber Jaya',
                'contact_info' => 'Jl. Pahlawan No. 30, Jakarta',
                'created_by' => 2
            ],
            [
                'name' => 'PT. Sumber Bahagia',
                'contact_info' => 'Jl. Pahlawan No. 40, Jakarta',
                'created_by' => 3
            ],
            [
                'name' => 'PT. Sumber Sejahtera',
                'contact_info' => 'Jl. Pahlawan No. 50, Jakarta',
                'created_by' => 2
            ],
            [
                'name' => 'PT. Sumber Lancar',
                'contact_info' => 'Jl. Pahlawan No. 60, Jakarta',
                'created_by' => 3
            ],
            [
                'name' => 'PT. Sumber Jasa',
                'contact_info' => 'Jl. Pahlawan No. 70, Jakarta',
                'created_by' => 1
            ],
            [
                'name' => 'PT. Sumber Usaha',
                'contact_info' => 'Jl. Pahlawan No. 80, Jakarta',
                'created_by' => 2
            ],
            [
                'name' => 'PT. Sumber Maju',
                'contact_info' => 'Jl. Pahlawan No. 90, Jakarta',
                'created_by' => 3
            ],
            [
                'name' => 'PT. Sumber Berkat',
                'contact_info' => 'Jl. Pahlawan No. 100, Jakarta',
                'created_by' => 1
            ]
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::create($supplier);
        }
    }
}
