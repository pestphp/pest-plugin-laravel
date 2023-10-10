<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

use function Pest\Laravel\assertDatabaseHas;

test('pass', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDatabaseHas('users', ['id' => $user->id]);
});

test('fails', function () {
    assertDatabaseHas('users', ['id' => 1]);
})->throws(ExpectationFailedException::class);
