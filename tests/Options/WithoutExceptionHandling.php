<?php

use Illuminate\Support\Facades\Route;

uses()->group('options');

test('--without-exception-handling', function () {
    Route::get('/exception', function () {
        throw new Exception('Exception message');
    });

    $this->get('/exception');
})->throws(Exception::class, 'Exception message');
