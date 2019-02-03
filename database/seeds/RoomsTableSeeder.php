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
            'description' => 'Jednokrevetna soba - prvi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 1500,
        ]);

        DB::table('rooms')->insert([
            'number' => 201,
            'type' => 1,
            'description' => 'Jednokrevetna soba - drugi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 1500,
        ]);

        DB::table('rooms')->insert([
            'number' => 301,
            'type' => 1,
            'description' => 'Jednokrevetna soba - treći sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 1500,
        ]);

        DB::table('rooms')->insert([
            'number' => 102,
            'type' => 2,
            'description' => 'Dvokrevetna soba - prvi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 2500,
        ]);

        DB::table('rooms')->insert([
            'number' => 202,
            'type' => 2,
            'description' => 'Dvokrevetna soba - drugi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 2500,
        ]);

        DB::table('rooms')->insert([
            'number' => 302,
            'type' => 2,
            'description' => 'Dvokrevetna soba - treći sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 2500,
        ]);

        DB::table('rooms')->insert([
            'number' => 103,
            'type' => 3,
            'description' => 'Trokrevetna soba - prvi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 3500,
        ]);

        DB::table('rooms')->insert([
            'number' => 203,
            'type' => 3,
            'description' => 'Trokrevetna soba - drugi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 3500,
        ]);

        DB::table('rooms')->insert([
            'number' => 303,
            'type' => 3,
            'description' => 'Trokrevetna soba - treći sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 3500,
        ]);

        DB::table('rooms')->insert([
            'number' => 403,
            'type' => 3,
            'description' => 'Trokrevetna soba - četvrti sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 3500,
        ]);

        DB::table('rooms')->insert([
            'number' => 104,
            'type' => 4,
            'description' => 'Četvorokrevetni apartman - prvi sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 4500,
        ]);

        DB::table('rooms')->insert([
            'number' => 304,
            'type' => 4,
            'description' => 'Četvorokrevetni apartman - treći sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 4500,
        ]);

        DB::table('rooms')->insert([
            'number' => 404,
            'type' => 4,
            'description' => 'Četvorokrevetni apartman - četvrti sprat',
            'active' => true,
            'created_at' => now(),
            'updated_at' => now(),
            'price' => 4500,
        ]);
    }
}
