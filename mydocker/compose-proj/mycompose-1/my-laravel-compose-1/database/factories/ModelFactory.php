<?php

use Faker\Generator as Faker;
use App\Kospenuser;
use Faker\Provider\kk_KZ\Person;

// Kospenuser::class
$factory->define(Kospenuser::class, function (Faker $faker) {
    
	$IDfaker = new Faker();
	$IDfaker->addProvider(new Person($faker));
	
	return [	
        'name' => $faker->name,
		'ic' => $IDfaker->individualIdentificationNumber(null, $faker->biasedNumberBetween(0,1)),
		'gender' => $faker->biasedNumberBetween(1,2),
		'address' => $faker->address,
		'state' => 'PAHANG',
		'region' => 'MARAN',
		'subregion' => 'JENGKA2',
		'locality' => 'JENGKA6',
		'firstRegRegion' => $faker->city,
		];
});


