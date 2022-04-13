<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

beforeEach(function () {
    $this->user1 = User::query()->create([
        'name'     => 'Jane Doe',
        'email'    => 'jane@doe.email',
        'password' => 'secret',
    ]);
    $this->user2 = User::query()->create([
        'name'     => 'Katie Bouman',
        'email'    => 'awesome@discovery.email',
        'password' => 'black holes rule',
    ]);
    $this->user3 = User::query()->create([
        'name'     => 'Jess Archer',
        'email'    => 'not-her@actual.email',
        'password' => 'very secure',
    ]);
});

test('pass', function () {
    expect($this->user1)->toBeThisModel($this->user1);
    expect($this->user1)->not()->toBeThisModel($this->user2);
});

test('failures', function () {
    expect($this->user1)->toBeThisModel($this->user2);
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    expect($this->user1)->not()->toBeThisModel($this->user1);
})->throws(ExpectationFailedException::class);
