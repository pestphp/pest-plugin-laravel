<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Closure;
use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

expect()->pipe('toContain', function (Closure $next, mixed $expected) {
    // @phpstan-ignore-next-line
    if ($this->value instanceof \Illuminate\Support\Collection && is_callable($expected)) {
        // @phpstan-ignore-next-line
        return expect($this->value)->contains($expected)->toBeTrue();
    }

    return $next(); // Run to the original, built-in expectation...
});
