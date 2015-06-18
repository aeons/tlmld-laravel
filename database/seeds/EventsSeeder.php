<?php

use App\Event;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->delete();

        $faker = Factory::create();

        Event::create([
            'title'          => $faker->sentence(4) . ' (active)',
            'description'    => $faker->paragraph(5),
            'active_at'      => new DateTime,
            'inactive_at'    => (new DateTime)->add(new DateInterval('P10D')),
            'starts_at'      => new DateTime('2015-07-04 18:00'),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (not yet active)',
            'description'    => $faker->paragraph(5),
            'active_at'      => (new DateTime)->add(new DateInterval('P10D')),
            'inactive_at'    => (new DateTime)->add(new DateInterval('P20D')),
            'starts_at'      => new DateTime('2015-07-04 18:00'),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (inactive)',
            'description'    => $faker->paragraph(5),
            'active_at'      => (new DateTime)->sub(new DateInterval('P20D')),
            'inactive_at'    => (new DateTime)->sub(new DateInterval('P10D')),
            'starts_at'      => new DateTime('2015-07-04 18:00'),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (past event)',
            'description'    => $faker->paragraph(5),
            'active_at'      => new DateTime('2015-03-01'),
            'inactive_at'    => new DateTime('2015-03-15'),
            'starts_at'      => new DateTime('2015-05-01 12:00'),
            'payment_needed' => true,
        ]);
    }
}