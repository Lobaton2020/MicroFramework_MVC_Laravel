<?php

function view($view, $data = [])
{
    extract($data);
    $view = str_replace('.', '/', $view);
    require APP_PATH . "views/{$view}.php";
}
