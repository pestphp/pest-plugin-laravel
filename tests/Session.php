<?php

use function Pest\Laravel\startSession;

startSession(['foo' => 'bar'])->assertGuest();
