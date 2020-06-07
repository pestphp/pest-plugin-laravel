<?php

use function Pest\Laravel\{get};

get('/')->assertSee('laravel');
