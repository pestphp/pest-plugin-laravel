<?php

use function Pest\Laravel\assertNotSoftDeleted;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\SoftDeletableUser;

test('pass', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertNotSoftDeleted($user);
});

test('fails', function () {
    $user = SoftDeletableUser::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    assertNotSoftDeleted($user);
})->throws(ExpectationFailedException::class);
