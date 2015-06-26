<?php

use Tlmld\Models\Event;
use Carbon\Carbon;
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
            'active_on'      => Carbon::now(),
            'inactive_on'    => Carbon::now()->addDays(10),
            'starts_at'      => Carbon::now()->addDays(20),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (not yet active)',
            'description'    => $faker->paragraph(5),
            'active_on'      => Carbon::now()->addDays(10),
            'inactive_on'    => Carbon::now()->addDays(20),
            'starts_at'      => Carbon::now()->addDays(30),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (inactive)',
            'description'    => $faker->paragraph(5),
            'active_on'      => Carbon::now()->subDays(20),
            'inactive_on'    => Carbon::now()->subDays(10),
            'starts_at'      => Carbon::now(),
            'payment_needed' => true,
        ]);

        Event::create([
            'title'          => $faker->sentence(4) . ' (past event)',
            'description'    => $faker->paragraph(5),
            'active_on'      => new DateTime('2015-03-01'),
            'inactive_on'    => new DateTime('2015-03-15'),
            'starts_at'      => new DateTime('2015-05-01 12:00'),
            'payment_needed' => true,
        ]);
    }
}
