<?php

use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

use function Pest\Laravel\assertDatabaseHasMany;

test('pass', function () {
    $user_1 = User::create([
        'name' => 'test user1',
        'email' => 'email1@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user_2 = User::create([
        'name' => 'test user2',
        'email' => 'email2@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDatabaseHasMany('users', [
        ['id' => $user_1->id],
        ['id' => $user_2->id]
    ]);
});

test('fails', function () {
    $user_1 = User::create([
        'name' => 'test user1',
        'email' => 'email1@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDatabaseHasMany('users', [
        ['id' => $user_1->id],
        ['id' => 2]
    ]);
})->throws(ExpectationFailedException::class);
