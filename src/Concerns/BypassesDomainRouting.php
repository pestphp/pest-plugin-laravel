<?php

declare(strict_types=1);

namespace Pest\Laravel\Concerns;

use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Route;

trait BypassesDomainRouting
{
    public function setupBypassesDomainRouting(): void
    {
        if (! isset(Route::$validators)) {
            Route::$validators = Route::getValidators();
        }

        foreach (Route::$validators as $key => $validator) {
            if ($validator instanceof HostValidator) {
                unset(Route::$validators[$key]);
            }
        }
    }
}
