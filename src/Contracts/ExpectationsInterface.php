<?php

namespace Pest\Laravel\Contracts;

use Pest\Each;
use Pest\Expectation;
use Pest\Support\Extendable;

/**
 * @property Expectation|Extendable|\Pest\Laravel\Contracts\ExpectationsInterface $not  Creates the opposite expectation.
 * @property Each                                                                 $each Creates an expectation on each element on the traversable value.
 *
 * @internal
 */
interface ExpectationsInterface
{
    /**
     * Asserts that the value is an instance of \Illuminate\Support\Collection.
     *
     * @return Expectation|Extendable|\Illuminate\Support\Collection
     */
    public function toBeCollection();
}
