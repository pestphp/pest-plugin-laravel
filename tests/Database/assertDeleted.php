<?php

use Illuminate\Support\Str;
use Tests\TestCase;
use function Pest\Laravel\assertDeleted;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    if (!method_exists(TestCase::class, 'assertDeleted')) {
        $this->markTestSkipped('assertModelExist not supported for this laravel version');
    }

    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    assertDeleted($user);
});

test('fails', function () {
    $user = User::create([
        'name' => 'test user',
        'email' => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDeleted($user);
})->throws(ExpectationFailedException::class);
