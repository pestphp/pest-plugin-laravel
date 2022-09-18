<?php

use function Pest\Laravel\assertDatabaseCount;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    assertDatabaseCount('users', 0);

    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDatabaseCount('users', 1);
});

test('fails', function () {
    assertDatabaseCount('users', 1);
})->throws(ExpectationFailedException::class);
