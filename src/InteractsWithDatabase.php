<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\TestCase;

if (!function_exists('assertDatabaseHas')) {
    /**
     * Assert that a table in the database contains the given data.
     *
     * @param string               $table
     * @param array<string, mixed> $data
     * @param string|null          $connection
     */
    function assertDatabaseHas($table, array $data, $connection = null): TestCase
    {
        return test()->assertDatabaseHas($table, $data, $connection);
    }
}

if (!function_exists('assertDatabaseMissing')) {
    /**
     * Assert that a table in the database does not contain the given data.
     *
     * @param string               $table
     * @param array<string, mixed> $data
     * @param string|null          $connection
     */
    function assertDatabaseMissing($table, array $data, $connection = null): TestCase
    {
        return test()->assertDatabaseHas($table, $data, $connection);
    }
}

if (!function_exists('assertDatabaseCount')) {
    /**
     * Assert the count of table entries.
     *
     * @param string      $table
     * @param string|null $connection
     */
    function assertDatabaseCount($table, int $count, $connection = null): TestCase
    {
        return test()->assertDatabaseCount($table, $count, $connection);
    }
}

if (!function_exists('assertDeleted')) {
    /**
     * Assert that the given record has been deleted.
     *
     * @param \Illuminate\Database\Eloquent\Model|string $table
     * @param array<string, mixed>                       $data
     * @param string|null                                $connection
     */
    function assertDeleted($table, array $data = [], $connection = null): TestCase
    {
        return test()->assertDeleted($table, $data, $connection);
    }
}

if (!function_exists('assertSoftDeleted')) {
    /**
     * Assert that the given record has been "soft deleted".
     *
     * @param \Illuminate\Database\Eloquent\Model|string $table
     * @param array<string, mixed>                       $data
     * @param string|null                                $connection
     * @param string|null                                $deletedAtColumn
     */
    function assertSoftDeleted($table, array $data = [], $connection = null, $deletedAtColumn = 'deleted_at'): TestCase
    {
        return test()->assertSoftDeleted($table, $data, $connection, $deletedAtColumn);
    }
}
