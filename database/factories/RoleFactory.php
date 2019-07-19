<?php

use App\Model;
use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;

/* @var $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(Role::class, function (Faker $faker): array {
    return ['name' => $faker->name];
});
