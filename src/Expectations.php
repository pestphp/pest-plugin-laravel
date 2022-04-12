<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Database\Eloquent\Model;
use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

expect()->extend('toBeThisModel', function (Model $model): Expectation {
    expect($this->value->is($model))->toBeTrue();

    return $this;
});
