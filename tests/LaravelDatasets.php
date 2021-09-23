<?php

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\laravelDataset;

$GLOBALS['testCount'] = 0;

it('can build a dataset that has full access to the Laravel framework', function (string $data) {
    expect($data)->toBeIn(['foo', 'bar']);
    $GLOBALS['testCount']++;
})->with(laravelDataset(function ($app) {
    expect($app)->toBeInstanceOf(Application::class);

    // Test facades don't throw errors
    Route::get('/test', function () {
        return 'Hello World';
    });

    return ['foo', 'bar'];
}));

afterAll(function () {
    expect($GLOBALS['testCount'])->toBe(2);
});
