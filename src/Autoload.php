<?php

(static function () {
    $files = [
        'InteractsWithAuthentication.php',
    ];

    foreach ($files as $file) {
        require_once $file;
    }
})();
