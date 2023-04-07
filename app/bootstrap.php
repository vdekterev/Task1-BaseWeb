<?php
// Config
require_once 'config/config.php';
// Helpers
require_once 'helpers/url_redirect.php';
require_once 'helpers/session_helper.php';
// Libraries
spl_autoload_register(function ($className) {
    require_once "libraries/{$className}.php";
});
