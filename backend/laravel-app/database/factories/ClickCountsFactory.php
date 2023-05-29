<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClickCounts;
use Faker\Generator as Faker;

$factory->define(ClickCounts::class, function (Faker $faker) {
    static $number = 1;
    return [
        'count'=>$number + 1,
        'date'=>now()
    ];
});
