<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\SoftDeletableUser;
use Tests\TestCase;

use function Pest\Laravel\assertNotSoftDeleted;

test('pass', function () {
    if (! method_exists(TestCase::class, 'assertModelExists')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertNotSoftDeleted($user);
});

test('fails', function () {
    if (! method_exists(TestCase::class, 'assertModelExists')) {
        throw new ExpectationFailedException("'assertModelExist not supported for this laravel version'");
    }

    $user = SoftDeletableUser::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    assertNotSoftDeleted($user);
})->throws(ExpectationFailedException::class);
