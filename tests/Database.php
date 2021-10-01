<?php

use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;
use Tests\Models\User;
use Tests\TestCase;

assertDatabaseMissing('users', ['id' => 1]);

test('assert model missing', function () {
    if (!method_exists(TestCase::class, 'assertModelExists')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = User::make([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);
    $user->id = 1;

    assertModelMissing($user);
});

test('assert model exists', function () {
    if (!method_exists(TestCase::class, 'assertModelExists')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertModelExists($user);
});
