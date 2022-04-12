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
    $this->collection = collect([$this->user1, $this->user2]);
});

test('pass', function () {
    expect($this->collection)->toContainModel($this->user1);
    expect($this->collection)->not()->toContainModel($this->user3);
});

test('failures', function () {
    expect($this->collection)->toContainModel($this->user3);
})->throws(ExpectationFailedException::class);

test('not failures', function () {
    expect($this->collection)->not()->toContainModel($this->user2);
})->throws(ExpectationFailedException::class);
