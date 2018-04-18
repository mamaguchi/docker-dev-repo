<?php

use Faker\Generator as Faker;
use App\Screening;
use Faker\Provider\kk_KZ\Person;

// Screening::class
$factory->define(Screening::class, function (Faker $faker) {
	
    return [
		'fk_ic' => 880601105149,
		'date' => $faker->date,
		'weight' => $faker->biasedNumberBetween(40,100),
		'height' => $faker->biasedNumberBetween(100,180),
		'systolic' => $faker->biasedNumberBetween(90,190),
		'diastolic' => $faker->biasedNumberBetween(50,60),
		'dxt' => $faker->biasedNumberBetween(5,15),
		'smoker' => (bool)$faker->biasedNumberBetween(0,1),
		'sendToServer' => true,
		];
});
