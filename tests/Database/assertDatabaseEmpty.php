<?php

use function Pest\Laravel\assertDatabaseEmpty;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    assertDatabaseEmpty('users');
});

test('fails', function () {
    User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDatabaseEmpty('users');
})->throws(ExpectationFailedException::class);
