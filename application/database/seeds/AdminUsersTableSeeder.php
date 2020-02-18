<?php

use Faker\Factory as Fake;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => '管理者',
            'email' => 'admin@a.com',
            'is_owner' => true,
            'password' => Hash::make('pass'),
            'created_at' => new Datetime(),
        ]);
        $fake = Fake::create('ja_JP');
        for ($i = 0; $i < 13; $i++) {
            DB::table('admin_users')->insert([
                'name' => $fake->name,
                'email' => $fake->email,
                'is_owner' => false,
                'password' => Hash::make('pass'),
                'created_at' => new Datetime(),
            ]);
        }
    }
}
