<?php

use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\assertDatabaseCount;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use function Pest\Laravel\assertModelIs;

test('pass', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $expected = User::find($user->id);

    assertModelIs($expected, $user);
});

test('fails', function () {
    $user = User::create([
        'name' => 'test user a',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $expected = User::create([
        'name' => 'test user b',
        'email' => 'email@test.yy',
        'password' => Hash::make('password'),
    ]);

    assertModelIs($expected, $user);
})->throws(ExpectationFailedException::class);
