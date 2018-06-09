<?php

use Illuminate\Database\Seeder;

class TrackerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tracker_qty = 10;

        factory(App\Tracker::class, $tracker_qty)->create();

        $vehicles = \App\Vehicle::pluck('id');
        $trackers = \App\Tracker::pluck('id');
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        for ($n = 0; $n <= $tracker_qty-1; $n++) {
            $start = \Carbon\Carbon::now()->subMonth(2)->format('Y-m-d H:i:s');
            $trackerVehicle = new \App\TrackerVehicle();
            $trackerVehicle->vehicle_id = $vehicles[$n];
            $trackerVehicle->tracker_id = $trackers[$n];
            $trackerVehicle->install = $start;
            $trackerVehicle->created_at = $start;
            $trackerVehicle->save();

            $time = \Carbon\Carbon::now()->subMonth(2)->format('Y-m-d H:i:s');
            $j = 0;
            while ($time <= \Carbon\Carbon::now()->format('Y-m-d H:i:s')) {
                $time = \Carbon\Carbon::now()->subMonth(2)->addMinutes($j)->format('Y-m-d H:i:s');
                $TrackerLog = new \App\TrackerLog();
                $TrackerLog->tracker_id = $trackers[$n];
                $TrackerLog->longitude = $faker->longitude;
                $TrackerLog->latitude = $faker->latitude;
                $TrackerLog->created_at = $time;
                $TrackerLog->save();
                $j+= 30;
            }
        }
    }
}
