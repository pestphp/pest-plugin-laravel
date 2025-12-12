<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Pest\Expectation;
use Pest\Matchers\Any;
use PHPUnit\Framework\Assert;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

/*
 * Asserts that the value is an instance of \Illuminate\Database\Eloquent\Model
 */
expect()->extend('toBeModel', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Database\Eloquent\Model::class);
});

/**
 * Asserts that the value is an Eloquent model with the given attribute and an optional value.
 */
expect()->extend('toHaveModelAttribute', function (string $name, mixed $value = new Any, string $message = ''): Expectation {
    $this->toBeModel();

    // @phpstan-ignore-next-line
    Assert::assertTrue($this->value->hasAttribute($name), $message);

    if (! $value instanceof Any) {
        // @phpstan-ignore-next-line
        Assert::assertEquals($value, $this->value->getAttribute($name), $message);
    }

    return $this;
});

/**
 * Asserts that the value is an Eloquent model with the given attributes and optional values.
 */
expect()->extend('toHaveModelAttributes', function (iterable $names, string $message = ''): Expectation {
    foreach ($names as $name => $value) {
        is_int($name) ? $this->toHaveModelAttribute($value, message: $message) : $this->toHaveModelAttribute($name, $value, $message); // @phpstan-ignore-line
    }

    return $this;
});
