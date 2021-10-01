<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase;

/**
 * Assert that a given where condition exists in the database.
 *
 * @return TestCase
 */
function assertDatabaseHas(string $table, array $data, string $connection = null)
{
    return test()->assertDatabaseHas(...func_get_args());
}

/**
 * Assert that a given where condition does not exist in the database.
 *
 * @return TestCase
 */
function assertDatabaseMissing(string $table, array $data, string $connection = null)
{
    return test()->assertDatabaseMissing(...func_get_args());
}

/**
 * Assert the given model exists in the database.
 *
 * @return TestCase
 */
function assertModelExists(Model $model)
{
    return test()->assertModelExists($model);
}

/**
 * Assert the given model does not exist in the database.
 *
 * @return TestCase
 */
function assertModelMissing(Model $model)
{
    return test()->assertModelMissing($model);
}

/**
 * Assert the count of table entries.
 *
 * @return TestCase
 */
function assertDatabaseCount(string $table, int $count, string $connection = null)
{
    return test()->assertDatabaseCount(...func_get_args());
}

/**
 * Assert the given record has been deleted.
 *
 * @param Model|string $table
 *
 * @return TestCase
 */
function assertDeleted($table, array $data = [], string $connection = null)
{
    return test()->assertDeleted(...func_get_args());
}

/**
 * Assert the given record has been "soft deleted".
 *
 * @param Model|string $table
 *
 * @return TestCase
 */
function assertSoftDeleted($table, array $data = [], string $connection = null, string $deletedAtColumn = 'deleted_at')
{
    return test()->assertSoftDeleted(...func_get_args());
}

/**
 * Determine if the argument is a soft deletable model.
 *
 * @param mixed $model
 */
function isSoftDeletableModel($model): bool
{
    return test()->isSoftDeletableModel(...func_get_args());
}

/**
 * Get the database connection.
 */
function getConnection(string $connection = null): Connection
{
    return test()->getConnection(...func_get_args());
}

/**
 * Seed a given database connection.
 *
 * @param array|string $class
 *
 * @return TestCase
 */
function seed($class = 'Database\\Seeders\\DatabaseSeeder')
{
    return test()->seed(...func_get_args());
}
