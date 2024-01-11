<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class booksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \faker\Factory::create();
        for ($i = 0; $i < 29; $i++) {

            Books::create([
                'name' => $faker->sentence(),
                'auther' => $faker->name(),
                'publish_date' => $faker->date()
            ]);
        }
    }
}
