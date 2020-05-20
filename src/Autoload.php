<?php

(static function () {
    $files = [
        'InteractsWithAuthentication.php',
        'InteractsWithDatabase.php',
    ];

    foreach ($files as $file) {
        require_once $file;
    }
})();
