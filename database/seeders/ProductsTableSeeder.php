<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'Sabun Batang',
                'code' => 'SKUSKILNP01',
                'slug' => 'sabun-batang',
                'categori_id' => '4',
                'price' => '10000',
                'discount' => '10',
                'dimension' => '10cm X 5cm',
                'unit' => 'PCS',
                'description' => 'Sabun Batang'
            ],
            [
                'name' => 'Sabun Cair',
                'code' => 'SKUSKILNP02',
                'slug' => 'sabun-cair',
                'categori_id' => '4',
                'price' => '15000',
                'discount' => '0',
                'dimension' => '10cm X 5cm',
                'unit' => 'PCS',
                'description' => 'Sabun Cair'
            ],
            [
                'name' => 'Mie Instan',
                'code' => 'SKUSKILNP01',
                'slug' => 'mie-instan',
                'categori_id' => '1',
                'price' => '3000',
                'discount' => '0',
                'dimension' => '15cm X 5cm',
                'unit' => 'PCS',
                'description' => 'Mie Instan'
            ],
        ]);
    }
}
