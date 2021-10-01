<?php

use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;
use Tests\Models\User;

assertDatabaseMissing('users', ['id' => 1]);

test('assert model missing', function () {
    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);
    $user->id = 1;

    assertModelMissing($user);
})->skip(function () {
    return substr(app()->version(), 0, 2) == '7.';
}, 'assertModelExist not supported in laravel 7');

test('assert model exists', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertModelExists($user);
})->skip(function () {
    return substr(app()->version(), 0, 2) == '7.';
}, 'assertModelExist not supported in laravel 7');
