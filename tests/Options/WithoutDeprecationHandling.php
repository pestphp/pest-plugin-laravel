<?php

use Illuminate\Support\Facades\Route;

uses()->group('options');

test('--without-deprecation-handling', function () {
    Route::get('/exception', function () {
        str_replace(null, null, null);
    });

    $this->get('/exception');
})->throws(Exception::class, 'str_replace(): Passing null to parameter #1 ($search) of type array|string is deprecated');
