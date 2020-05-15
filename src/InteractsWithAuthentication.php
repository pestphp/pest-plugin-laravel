<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\TestCase;

if (!function_exists('assertAuthenticated')) {
    /**
     * Assert that the user is authenticated.
     */
    function assertAuthenticated(string $guard = null): TestCase
    {
        return test()->assertAuthenticated($guard);
    }
}
