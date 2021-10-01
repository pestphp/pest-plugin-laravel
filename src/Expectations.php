<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

/*
 * Asserts the given model exists in the database.
 */
expect()->extend('toExist', function (): Expectation {
    assertModelExists($this->value);

    return $this;
});
