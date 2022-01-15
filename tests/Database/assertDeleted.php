<?php

use Illuminate\Support\Str;
use function Pest\Laravel\assertDeleted;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    dump(app()->version());
    if (!Str::of(app()->version())->startsWith('8')) {
        dump('skip');
        $this->markTestSkipped('Unsupported feature for Laravel ' . app()->version());
    }

    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user->delete();

    assertDeleted($user);
});

test('fails', function () {
    $user = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    assertDeleted($user);
})->throws(ExpectationFailedException::class);
