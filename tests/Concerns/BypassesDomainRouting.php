<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Routing\Route;
use Pest\Laravel\Concerns\BypassesDomainRouting;

test('domain validation is removed from laravel routing', function () {
    // at this point we'd expect to see the HostValidator
    expect(collect(Route::getValidators()))
        ->filter(fn (ValidatorInterface $validator) => $validator instanceof HostValidator)
        ->toHaveCount(1);

    // build a class that uses this concern
    (new class
    {
        use BypassesDomainRouting;
    })->setupBypassesDomainRouting();

    // and check we no longer have our HostValidator
    expect(collect(Route::getValidators()))
        ->toHaveCount(3)
        ->filter(fn (ValidatorInterface $validator) => $validator instanceof HostValidator)
        ->toHaveCount(0);
});

test('if a custom validator has been added, it retains it', function () {

    $anonymousClass = new class implements ValidatorInterface
    {
        public function matches(Route $route, Request $request)
        {
            return true;
        }
    };

    // add a custom validator.
    Route::$validators = [...Route::getValidators(), $anonymousClass];

    (new class
    {
        use BypassesDomainRouting;
    })->setupBypassesDomainRouting();

    expect(collect(Route::getValidators()))
        ->toHaveCount(4)
        ->filter(fn (ValidatorInterface $validator) => $validator instanceof $anonymousClass)
        ->toHaveCount(1);
});
