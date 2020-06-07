<?php

use function Pest\Laravel\{artisan};

artisan('inspire')->expectsOutput('pest');
