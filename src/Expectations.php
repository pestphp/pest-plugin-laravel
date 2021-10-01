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
 * Asserts that the given where condition exists in the database
 *
 * @param \Illuminate\Database\Eloquent\Model|string $table
 * @param string|null $connection
 */
expect()->extend('toBeInDatabase', function ($table, $connection = null): Expectation {
    // @phpstan-ignore-next-line
    assertDatabaseHas($table, $this->value, $connection);

    // @phpstan-ignore-next-line
    return $this;
});
