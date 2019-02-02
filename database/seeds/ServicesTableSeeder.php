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
        /*DB::table('services')->insert([
            'name' => 'Smeštaj',
            'price' => '2400',
        ]);*/

        DB::table('services')->insert([
            'name' => 'Boravišna taksa',
            'price' => '200',
        ]);

        DB::table('services')->insert([
            'name' => 'Klima',
            'price' => '500',
        ]);
    }
}
