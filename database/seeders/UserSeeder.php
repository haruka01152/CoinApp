<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'haruka',
                'email' => 'yamamoto-har@kk-technica.co.jp',
                'password' => Hash::make('hamutarou115'),
            ],
            [
                'name' => '2haruka',
                'email' => '2yamamoto-har@kk-technica.co.jp',
                'password' => Hash::make('hamutarou115'),
            ],
            [
                'name' => '3haruka',
                'email' => '3yamamoto-har@kk-technica.co.jp',
                'password' => Hash::make('hamutarou115'),
            ],
        ]);
    }
}
