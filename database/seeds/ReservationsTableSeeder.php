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
            $guest = factory(App\Guest::class)->create();
            $stay = factory(App\Stay::class)->make();
            $guest->stays()->save($stay);
            $reservation->stay()->save($stay);
            $stay->room_id = $reservation->room_id;
            $stay->save();
        });
    }
}
