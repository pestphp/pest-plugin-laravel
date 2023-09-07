<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

use function Pest\Laravel\assertDatabaseEmpty;

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
