<?php

use function Pest\Laravel\{withoutMiddleware};

withoutMiddleware()->get('/')->assertSee('laravel');
