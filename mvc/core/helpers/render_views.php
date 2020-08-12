<?php

function view($view, $data = [], $all = true)
{
    extract($data);
    $view = str_replace('.', '\\', $view);
    if (file_exists(APP_PATH . "views" . SEPARATOR . "{$view}.php")) {
        require_once APP_PATH . "views" . SEPARATOR . "layouts" . SEPARATOR . "header.php";
        if ($all) {
            require_once APP_PATH . "views" . SEPARATOR . "layouts" . SEPARATOR . "navbar.php";
        }
        require_once APP_PATH . "views" . SEPARATOR . "{$view}.php";
        require_once APP_PATH . "views" . SEPARATOR . "layouts" . SEPARATOR . "footer.php";
    } else {
        exit("View not found");
    }
}
