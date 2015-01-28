<?php

$factory('Knot\Users\User', [
    'email'      => 'email@domain.com',
    'password'   => 'password',
    'created_at' => $faker->date(),
    'updated_at' => $faker->date()
]);