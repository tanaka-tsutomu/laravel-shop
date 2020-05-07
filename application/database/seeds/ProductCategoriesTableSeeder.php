<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1, $j = 25; $i <= 25; $i++, $j--) {
            DB::table('product_categories')->insert([
                'name' => "Category {$j}",
                'order_no' => "{$j}",
                'created_at' => new Datetime(),
            ]);
        }
    }
}
