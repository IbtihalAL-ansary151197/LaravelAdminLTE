<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Mostafa Elansary',
            'email' => '@gmail101.com',
            'password' => 'password102',
        ]);
    }
}
