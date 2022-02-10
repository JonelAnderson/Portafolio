<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 2; $i++) {
            DB::table('users')->insert([
                'name' => $faker->randomElement(['Anderson', 'Nicela']),
                'email' => $faker->randomElement([
                    'anderson@gmail.com',
                    'nicela@gmail.com',
                ]),
                'password' => bcrypt(
                    $faker->randomElement(['123456', '123456'])
                ),
                'tipo_usuario' => 1,
            ]);
        }
    }
}
