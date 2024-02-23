<?php

it('tests snapshot on test response', function () {
    $response = $this->get('/');

    expect($response)->toMatchSnapshot();
});
