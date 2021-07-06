<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Pest\Expectation;

expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});
