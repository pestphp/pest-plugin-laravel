<?php

use function Pest\Laravel\post;
use PHPUnit\Framework\ExpectationFailedException;

beforeEach(function () {
    $this->route = route('contacts');

    $this->invalidData = [
        'name'  => '',
        'email' => '',
    ];

    $this->validData = [
        'name'  => 'Elyneker',
        'email' => 'elyneker@pest.com',
    ];
});

test('pass', function () {
    expect(post($this->route, $this->invalidData))->toHaveSessionErrors();

    expect(post($this->route, array_merge($this->invalidData, ['email' => 'elyneker@pest.com'])))->toHaveSessionErrors('name');

    expect(post($this->route, $this->invalidData))->toHaveSessionErrors(['name', 'email']);
});

test('not pass', function () {
    expect(post($this->route, $this->validData))->not->toHaveSessionErrors();

    expect(post($this->route, array_merge($this->validData, ['name' => ''])))->not->toHaveSessionErrors('email');

    expect(post($this->route, $this->validData))->not->toHaveSessionErrors(['name', 'email']);
});

test('failure', function () {
    expect(post($this->route, $this->validData))->toHaveSessionErrors();
})->throws(ExpectationFailedException::class);

test('not failure', function () {
    expect(post($this->route, $this->invalidData))->not->toHaveSessionErrors();
})->throws(ExpectationFailedException::class);

test('failure if the error key is incorrect', function () {
    expect(post($this->route, array_merge($this->invalidData, ['name' => 'Elyneker'])))->toHaveSessionErrors('name');
})->throws(ExpectationFailedException::class);

test('failure if object is not instance of TestRequest', function() {
    expect(123)->toHaveSessionErrors();
})->throws(ExpectationFailedException::class);
