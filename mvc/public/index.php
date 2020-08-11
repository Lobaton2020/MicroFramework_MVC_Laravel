<?php

chdir(dirname(__DIR__));
define('SYS_PATH', 'lib/');
define('APP_PATH', 'app/');
require_once APP_PATH . 'helpers/testing.php';
require_once APP_PATH . 'helpers/render_views.php';
spl_autoload_register(function ($class) {
    include SYS_PATH . $class . ".php";
});
include APP_PATH . "models/User.php";
require_once APP_PATH . 'http/routes.php';

new App();
