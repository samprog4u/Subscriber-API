<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        //websites::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few websites in our database:
        for ($i = 0; $i < 10; $i++) {
            DB::table('websites')->insert([
                'name' => $faker->company,
                'url' => $faker->url,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
