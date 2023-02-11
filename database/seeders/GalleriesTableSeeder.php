<?php

namespace Database\Seeders;

use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductGallery::insert()([
            [
                'product_id' => '1',
                'photo' => 'assets/product/iGmH9i36nJ4G1Ck7ZKrrBiT2CsYMk9pNmR5q1XQR.png'
            ],
            [
                'product_id' => '2',
                'photo' => 'assets/product/8W3yn60v086cDYAvdERfrMiRQrCCgJDUNClghkag.png'
            ],
            [
                'product_id' => '3',
                'photo' => 'assets/product/l99dl2F1R368RGtbbDbNKWrCurfzptEgG1dJfwSP.png'
            ],
        ]);
    }
}
