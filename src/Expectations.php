<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

expect()->extend('toContainModel', function (Model $model): Expectation {
    expect($this->value->some(function (Model $item) use ($model): bool {
        return $item->is($model);
    }))->toBeTrue();

    return $this;
});

expect()->extend('toContainModels', function (...$models): Expectation {
    $models = Collection::wrap($models)->flatten();

    expect($models)->not()->toBeEmpty();

    foreach ($models as $model) {
        expect($this->value)->toContainModel($model);
    }

    return $this;
});
