<?php

it('tests snapshot containing a csrf field', function () {
    session()->start();

    $value = \Illuminate\Support\Facades\Blade::render('@csrf-field');

    expect($value)->toMatchSnapshot();
});
