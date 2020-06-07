<?php

use function Pest\Laravel\{assertDatabaseMissing};

assertDatabaseMissing('users', ['id' => 1]);
