<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('products')->insert([
                'image_path' => "test image {$i}",
                'name' => "product {$i}",
                'price' => random_int(1000, 150000),
                'description' => "hogehoge {$i}",
                'product_category_id' => random_int(1, 25),
                'created_at' => new Datetime(),
            ]);
        }
    }
}
