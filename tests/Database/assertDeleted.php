<?php

use function Pest\Laravel\assertDeleted;

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use Tests\TestCase;

test('pass', function () {
    if (!method_exists(TestCase::class, 'assertDeleted')) {
        $this->markTestSkipped('assertDeleted not supported for this laravel version');
    }

    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    assertDeleted($user);
});

test('fails', function () {
    if (!method_exists(TestCase::class, 'assertDeleted')) {
        throw new ExpectationFailedException('assertDeleted not supported for this laravel version');
    }

    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDeleted($user);
})->throws(ExpectationFailedException::class);
