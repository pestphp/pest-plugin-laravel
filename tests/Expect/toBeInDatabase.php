<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect(['id' => $user->id])->toBeInDatabase('users');
    expect(['name' => 'test user'])->toBeInDatabase('users');
    expect(['email'    => 'email@test.xx'])->toBeInDatabase('users');
});

test('failures', function () {
    expect(['id' => 1])->toBeInDatabase('users');
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect(['id' => 1])->not->toBeInDatabase('users');
})->throws(ExpectationFailedException::class);
