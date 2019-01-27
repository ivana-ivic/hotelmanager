<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'number' => 101,
            'type' => 1,
            'description' => 'Jednokrevetna soba',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'number' => 102,
            'type' => 2,
            'description' => 'Dvokrevetna soba',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'number' => 103,
            'type' => 3,
            'description' => 'Trokrevetna soba',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'number' => 104,
            'type' => 4,
            'description' => 'Cetvorokrevetni apartman',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
