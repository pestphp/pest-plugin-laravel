<?php

use PHPUnit\Framework\ExpectationFailedException;

test('pass', function () {
    $date1 = \Carbon\Carbon::parse('2022-01-01 12:00:00');
    $date2 = \Carbon\Carbon::parse('2022-01-01 12:00:00');
    $date3 = \Carbon\Carbon::parse('2022-01-01 14:00:00');

    expect($date1)->toBe($date2);
    expect($date1)->not->toBe($date3);
});

test('failures', function () {
    $unexpected = (object) [];
    $date2 = \Carbon\Carbon::parse('2022-01-01 12:00:00');

    expect($unexpected)->toBe($date2);
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    $date1 = \Carbon\Carbon::parse('2022-01-01 12:00:00');
    $date2 = \Carbon\Carbon::parse('2022-01-01 12:00:00');

    expect($date1)->not->toBe($date2);
})->throws(ExpectationFailedException::class);
