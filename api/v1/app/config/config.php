<?php
define("DBHOST", "localhost");
define("DBNAME", "migrations_seeks_laravel");
define("DBUSER", "root");
define("DBPASWORD", "12345");
define("DBDRIVER", "mysql");
define("DBCHARSET", "utf8");
// datos del servidor

define("SEPARATOR", "\\");
define("APP_PATH", dirname(dirname(__FILE__)) . "\\");
define("SYS_PATH", dirname(dirname(dirname(__FILE__))) . "\\core\\");

define("URL_PROJECT",  $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . str_replace(basename($_SERVER["PHP_SELF"]), "", $_SERVER["PHP_SELF"]));
define("URL_APP",  $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . dirname(str_replace(basename($_SERVER["PHP_SELF"]), "", $_SERVER["PHP_SELF"])) . "/app/");
