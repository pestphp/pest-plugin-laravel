<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    $object = new User(['name' => 'Taylor Otwell', 'email' => 'taylor@laravel.com']);

    expect($object)
        ->toHaveModelAttributes(['name', 'email'])
        ->toHaveModelAttributes([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
        ]);
});

test('failures', function () {
    $object = new User;

    expect($object)
        ->toHaveModelAttributes(['name', 'email'])
        ->toHaveModelAttributes([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
        ]);
})->throws(ExpectationFailedException::class);

test('failures with custom message', function () {
    $object = new User;

    expect($object)
        ->toHaveModelAttributes(['name', 'email'], 'oh no!')
        ->toHaveModelAttributes([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
        ], 'oh no!');
})->throws(ExpectationFailedException::class, 'oh no!');

test('not failures', function () {
    $object = new User(['name' => 'Taylor Otwell', 'email' => 'taylor@laravel.com']);

    expect($object)->not->toHaveModelAttributes(['name', 'email'])
        ->not->toHaveModelAttributes([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
        ]);
})->throws(ExpectationFailedException::class);
