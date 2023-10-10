<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;
use Tests\TestCase;

use function Pest\Laravel\assertModelMissing;

test('pass', function () {
    if (! method_exists(TestCase::class, 'assertModelExists')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = User::make([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertModelMissing($user);
});

test('fails', function () {
    if (! method_exists(TestCase::class, 'assertModelExists')) {
        throw new ExpectationFailedException('assertModelExist not supported for this laravel version');
    }

    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertModelMissing($user);
})->throws(ExpectationFailedException::class);
