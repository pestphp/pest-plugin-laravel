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
    expect($this->collection)->toContainModels($this->user1);
    expect($this->collection)->toContainModels([$this->user1]);
    expect($this->collection)->not()->toContainModels($this->user3);
    expect($this->collection)->not()->toContainModels([$this->user3]);
});

test('failures', function ($data) {
    expect($this->collection)->toContainModels($data);
})
    ->with(function () {
        yield 'single model' => function () { return [$this->user3]; };
        yield 'models as array' => function () { return [[$this->user3]]; };
        yield 'empty array' => [[]];
    })
    ->throws(ExpectationFailedException::class);

test('not failures', function ($data) {
    expect($this->collection)->not()->toContainModels($data);
})
    ->with(function () {
        yield 'single model' => function () { return [$this->user2]; };
        yield 'models as array' => function () { return [[$this->user2]]; };
    })
    ->throws(ExpectationFailedException::class);
