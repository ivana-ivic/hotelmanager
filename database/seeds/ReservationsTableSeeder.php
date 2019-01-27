<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reservation::class, 3)->create()->each(function ($reservation) {
            $reservation->stay()->save(factory(App\Stay::class)->make());
        });
    }
}
