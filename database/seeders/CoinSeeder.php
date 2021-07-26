<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coins')->insert([
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
            [
                'name' => 'COIN',
                'user_id'  => 1,
                'number' => 100,
            ],
            [
                'name' => '2COIN',
                'user_id'  => 2,
                'number' => 100,
            ],
            [
                'name' => '3COIN',
                'user_id'  => 3,
                'number' => 100,
            ],
        ]);
    }
}
