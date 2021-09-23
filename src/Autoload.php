<?php

(static function () {
    $files = [
        'Authentication.php',
        'Console.php',
        'Container.php',
        'Database.php',
        'ExceptionHandling.php',
        'Expectations.php',
        'Http.php',
        'MocksApplicationServices.php',
        'Session.php',
        'Time.php',
        'Datasets.php',
    ];

    foreach ($files as $file) {
        require_once $file;
    }
})();
