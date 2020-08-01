<?php
use App\Models\Contribution\UserContribution;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(UserContribution::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text(255),
        'user_id' => 1,
    ];
});
