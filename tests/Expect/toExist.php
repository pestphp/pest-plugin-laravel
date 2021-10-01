<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use Tests\TestCase;

test('pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect($user)->toExist();
})->skip(
    !method_exists(TestCase::class, 'assertModelExistss'),
    'assertModelExist not supported for this laravel version'
);

test('failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    expect(expect($user)->toExist())->toThrow(ExpectationFailedException::class);

})->skip(
    !method_exists(TestCase::class, 'assertModelExistss'),
    'assertModelExist not supported for this laravel version'
);

test('not failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect(expect($user)->not->toExist())->toThrow(ExpectationFailedException::class);
})->skip(
    !method_exists(TestCase::class, 'assertModelExists'),
    'assertModelExist not supported for this laravel version'
);
