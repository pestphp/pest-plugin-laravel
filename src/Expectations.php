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
 * Asserts that the request has session errors.
 */
expect()->extend('toHaveSessionErrors', function ($keys = [], mixed $format = null, string $errorBag = 'default'): Expectation {
    // @phpstan-ignore-next-line
    test()->expect($this->value)->toBeInstanceOf(\Illuminate\Testing\TestResponse::class);

    // @phpstan-ignore-next-line
    $this->value->assertSessionHasErrors($keys, $format, $errorBag);

    // @phpstan-ignore-next-line
    return $this;
});
