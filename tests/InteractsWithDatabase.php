<?php

it('has assertDatabaseHas')
    ->assertTrue(function_exists('assertDatabaseHas'));

it('has assertDatabaseMissing')
    ->assertTrue(function_exists('assertDatabaseMissing'));

it('has assertDatabaseCount')
    ->assertTrue(function_exists('assertDatabaseCount'));

it('has assertDeleted')
    ->assertTrue(function_exists('assertDeleted'));

it('has assertSoftDeleted')
    ->assertTrue(function_exists('assertSoftDeleted'));
