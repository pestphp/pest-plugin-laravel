<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    expect(new User)->toBeModel();
    expect((object) [])->not->toBeModel();
});

test('failures', function () {
    expect((object) [])->toBeModel();
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    expect(new User)->not->toBeModel();
})->throws(ExpectationFailedException::class);
