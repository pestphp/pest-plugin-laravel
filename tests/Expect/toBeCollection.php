<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(collect([1, 2, 3]))->toBeCollection(); /* @phpstan-ignore-line */
    expect('1, 2, 3')->not->toBeCollection(); /* @phpstan-ignore-line */
});

test('failures', function () {
    expect((object) [])->toBeCollection(); /* @phpstan-ignore-line */
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    expect(collect(['a', 'b', 'c']))->not->toBeCollection(); /* @phpstan-ignore-line */
})->throws(ExpectationFailedException::class);
