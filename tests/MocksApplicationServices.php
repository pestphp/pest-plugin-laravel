<?php

use function Pest\Laravel\{withoutNotifications};

withoutNotifications()->get('/')->assertSee('laravel');
