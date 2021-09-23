<?php

declare(strict_types=1);

namespace Pest\Laravel;

use BadMethodCallException;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;

/**
 * Boot an instance of the Laravel application to return a dataset with.
 *
 * @template TValue
 *
 * @param Closure(Application): TValue $callback
 *
 * @return TValue
 */
function laravelDataset(Closure $callback)
{
    $traitsToTry = [
        'Tests\\CreatesApplication',
        'Orchestra\\Testbench\\Concerns\\CreatesApplication',
    ];

    $traitFQN = Arr::first($traitsToTry, function (string $traitToTry) {
        return trait_exists($traitToTry);
    });

    if ($traitFQN === null) {
        throw new BadMethodCallException('Laravel datasets require a CreatesApplication trait');
    }

    $factory = eval('return new class { use ' . $traitFQN . '; };');

    if (!method_exists($factory, 'createApplication')) {
        throw new BadMethodCallException('The CreatesApplication trait must have a public createApplication method');
    }

    /* @phpstan-ignore-next-line  */
    return $callback($factory->createApplication());
}
