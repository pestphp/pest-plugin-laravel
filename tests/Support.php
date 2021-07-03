<?php

use PHPUnit\Framework\ExpectationFailedException;

test('toBeCollection → pass', function () {
    expect(collect([1, 2, 3]))->toBeCollection();
    expect('1, 2, 3')->not->toBeCollection();
});

test('toBeCollection → failures', function () {
    expect((object) [])->toBeCollection();
})->throws(ExpectationFailedException::class);

test('toBeCollection → not failures', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeCollection();
})->throws(ExpectationFailedException::class);
