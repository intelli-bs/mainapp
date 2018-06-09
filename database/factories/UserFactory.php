<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$timezone = "Europe/Kiev";

$factory->define(App\User::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'payment_type' => $faker->randomElement(['hourly', 'daily', 'weekly', 'monthly', 'perJob']),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Vehicle::class, function (Faker $faker) {
    return [
        'model' => $faker->name,
        'fuel_consumption' => $faker->numberBetween(10,80)
    ];
});
$factory->define(App\Tracker::class, function (Faker $faker) {
    return [
        'serial_number' => $faker->ean13,
        'last_service_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
$factory->define(App\TrackerLog::class, function (Faker $faker) {
    return [
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
    ];
});
$factory->define(App\TrackerVehicle::class, function (Faker $faker){
    return [
        'action' => $faker->randomElement(['install','uninstall'])
    ];
});
$factory->define(App\EmployeeHourRate::class, function (Faker $faker){
    $start =  \Carbon\Carbon::now()->subMonth(2)->format('Y-m-d H:i:s');
    return [
        'rate' => $faker->randomElement([100, 80, 50]),
        'assigned' => $start,
    ];
});
$factory->define(App\EmployeeWorkLog::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'start' => $faker->dateTime($max = 'now',$timezone = "Europe/Kiev"),
        'end' => $faker->dateTime($max = 'now',$timezone = "Europe/Kiev")
    ];
});