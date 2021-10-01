<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use Tests\TestCase;

test('pass', function () {
    if (!method_exists(TestCase::class, 'assertModelExists')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect($user)->toExist();
});

test('failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    expect($user)->toExist();
})->throws(ExpectationFailedException::class)
    ->skip(
        !method_exists(TestCase::class, 'assertModelExists'),
        'assertModelExist not supported for this laravel version'
    );

test('not failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect($user)->not->toExist();
})->throws(ExpectationFailedException::class)
    ->skip(
        !method_exists(TestCase::class, 'assertModelExists'),
        'assertModelExist not supported for this laravel version'
    );
