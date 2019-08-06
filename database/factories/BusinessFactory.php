<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    $name = $faker->catchPhrase;
    return [
        'name' => $name,
        'slug' => Str::slug($name, '-'),
        'tagline' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'business_type' => random_int(1, 2),
        'account_type' => random_int(1, 2),
        'category_id' => random_int(1, 6),
        'expires_at' => $faker->date($format = 'Y-m-d'),
        'city_id' => random_int(2, 7),
        'address' => $faker->streetAddress,
        'contact_one' => $faker->e164PhoneNumber,
        'contact_two' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->url,
        'map_id' => 'ChIJEwYlXLXsoTkRuUBXavgtflI',
        'facebook_link' => 'https://www.facebook.com/'.$faker->slug,
        'twitter_link' => 'https://www.twitter.com/'.$faker->slug,
        'google_link' => 'https://www.plus.google.com/'.$faker->slug,
        'description_title' => 'About Us',
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'services_title' => 'Our Services',
        'services' => $faker->realText($maxNbChars = 250, $indexSize = 3),
        'profile_pic' => 'no_image.jpg',
        'cover_pic' => 'no_image.jpg',
    ];
});
