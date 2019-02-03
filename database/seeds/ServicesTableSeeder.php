<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Boravišna taksa',
            'price' => '200',
        ]);

        DB::table('services')->insert([
            'name' => 'Klima',
            'price' => '500',
        ]);

        DB::table('services')->insert([
            'name' => 'Buđenje',
            'price' => '200',
        ]);

        DB::table('services')->insert([
            'name' => 'Mini bar',
            'price' => '500',
        ]);

        DB::table('services')->insert([
            'name' => 'Bazen',
            'price' => '300',
        ]);

        DB::table('services')->insert([
            'name' => 'Dodatno čišćenje',
            'price' => '650',
        ]);
    }
}
