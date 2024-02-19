<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    expect(collect(['foo', 'bar']))
        ->toContain('foo')
        ->toContain('foo', 'bar')
        ->toContain(fn ($value) => $value === 'foo')
        ->not->toContain(fn ($value) => $value === 'baz');
});

test('failures', function () {
    expect(collect(['foo', 'bar']))
        ->toContain(fn ($value) => $value === 'baz');
})->throws(ExpectationFailedException::class);

test('original', function () {
    expect(['foo', 'bar'])
        ->toContain('foo')
        ->toContain('foo', 'bar')
        ->not->toContain('baz');
});
