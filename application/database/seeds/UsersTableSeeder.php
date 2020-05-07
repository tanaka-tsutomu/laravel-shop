<?php

use Faker\Factory as Fake;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => '使用者',
            'email' => 'user@a.com',
            'image_path' => null,
            'password' => Hash::make('pass'),
            'created_at' => new Datetime(),
        ]);
        $fake = Fake::create('ja_JP');
        for ($i = 0; $i < 13; $i++) {
            DB::table('users')->insert([
                'name' => $fake->name,
                'email' => $fake->email,
                'image_path' => null,
                'password' => Hash::make('pass'),
                'created_at' => new Datetime(),
            ]);
        }
    }
}
