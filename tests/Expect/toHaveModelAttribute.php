<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

$obj = new User(['name' => 'Taylor Otwell', 'email' => null]);

test('pass', function () use ($obj) {
    expect($obj)->toHaveModelAttribute('name');
    expect($obj)->toHaveModelAttribute('name', 'Taylor Otwell');
    expect($obj)->toHaveModelAttribute('email');
    expect($obj)->toHaveModelAttribute('email', null);
});

test('failures', function () use ($obj) {
    expect($obj)->toHaveModelAttribute('bar');
})->throws(ExpectationFailedException::class);

test('failures with message', function () use ($obj) {
    expect($obj)->toHaveModelAttribute(name: 'bar', message: 'oh no!');
})->throws(ExpectationFailedException::class, 'oh no!');

test('failures with message and Any matcher', function () use ($obj) {
    expect($obj)->toHaveModelAttribute('bar', expect()->any(), 'oh no!');
})->throws(ExpectationFailedException::class, 'oh no!');

test('not failures', function () use ($obj) {
    expect($obj)->not->toHaveModelAttribute('name');
})->throws(ExpectationFailedException::class);
