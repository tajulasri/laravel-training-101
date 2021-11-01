<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Asset;
use Faker\Generator as Faker;

$factory->define(Asset::class, function (Faker $faker) {
    echo "Seeding assets table".PHP_EOL;
    
    return [
        'user_id' =>1,
        'label' => $faker->word.'-ASSET',
        'asset_type_id'=>1,
        'asset_serial'=> 'KKTM-A-'.strtoupper($faker->uuid),
        'register_date' => now(),
        'asset_status_id'=>1,
        'expired_date'=>now()->addYears(2),
        'location_id'=>1,
    ];
});
