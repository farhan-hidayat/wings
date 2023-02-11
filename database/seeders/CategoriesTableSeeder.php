<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Foods',
                'photo' => 'assets/category/pPYdF8REJStAu7EvR2U8MCFFIGAx91fEYjPLVgoY.png',
                'slug' => 'foods'
            ],
            [
                'name' => 'Drinks',
                'photo' => 'assets/category/ODEUhbHguhUFU4w6CuwCQUvbcbq6NIrW86j5jMj0.png',
                'slug' => 'drinks'
            ],
            [
                'name' => 'Fabric Care',
                'photo' => 'assets/category/EFnV31ibizgo0ML52qXvhYaMViXzavBtI1h4odmX.png',
                'slug' => 'fabric-care'
            ], [
                'name' => 'Personal Care',
                'photo' => 'assets/category/tCsGyp1qSou7GNWGIgmaxipPbva8TqLAXP0EeiDH.png',
                'slug' => 'personal-care'
            ]
        ]);
    }
}
