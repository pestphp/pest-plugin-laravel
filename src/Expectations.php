<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Carbon\CarbonInterface;
use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

/*
 * Extends `toBe` to assert that a given Carbon instance is the same as expected.
 */
expect()->intercept('toBe', CarbonInterface::class, function (CarbonInterface $expected) {
    expect($expected->equalTo($this->value))->toBeTrue();
});
