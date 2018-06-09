<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 6)->create()->each(function($u) {
            $u->employeeHourRates()->save(factory(App\EmployeeHourRate::class)->make());
        });

        $employees = \App\User::pluck('id');
        $vehicles = \App\Vehicle::pluck('id');
        for($j= 0 ; $j <= 5 ; $j++ ) {
            $i = 0;
            $date = \Carbon\Carbon::now()->subMonth(2)->format('Y-m-d');
            while ($date <= \Carbon\Carbon::now()->format('Y-m-d')) {
                $date =  \Carbon\Carbon::now()->subMonth(2)->addDays($i)->format('Y-m-d');
                $start =  \Carbon\Carbon::today()->subMonth(2)->addDays($i)->addHours(8)->format('Y-m-d H:i:s');
                $end =  \Carbon\Carbon::today()->subMonth(2)->addDays($i)->addHours(17)->format('Y-m-d H:i:s');
                $EmployeeWorkLog = new \App\EmployeeWorkLog();
                $EmployeeWorkLog->user_id = $employees[$j];
                $EmployeeWorkLog->start = $start;
                $EmployeeWorkLog->end = $end;
                $EmployeeWorkLog->date = $date;
                $EmployeeWorkLog->created_at = $start;
                $EmployeeWorkLog->updated_at = $end;
                $EmployeeWorkLog->save();

                $vehicleEmployee = new \App\VehicleEmployee();
                $vehicleEmployee->vehicle_id = $vehicles[array_rand($vehicles->toArray())];
                $vehicleEmployee->user_id = $employees[$j];
                $vehicleEmployee->start = $start;
                $vehicleEmployee->end = $end;
                $vehicleEmployee->created_at = $start;
                $vehicleEmployee->updated_at = $end;
                $vehicleEmployee->save();
                $i++;
            }

        }
    }
}
