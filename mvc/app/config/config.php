<?php
define("DBHOST", "localhost");
define("DBNAME", "transpublic");
define("DBUSER", "root");
define("DBPASWORD", "12345");
define("DBDRIVER", "mysql");
define("DBCHARSET", "utf8");
// datos del servidor
define("PROTOCOL", "http");

define("SEPARATOR", "\\");
define("APP_PATH", dirname(dirname(__FILE__)) . "\\");
define("SYS_PATH", dirname(dirname(dirname(__FILE__))) . "\\core\\");

define("URL_PROJECT", PROTOCOL . '://' . $_SERVER["HTTP_HOST"] . '/' . str_replace(basename($_SERVER["PHP_SELF"]), "", $_SERVER["PHP_SELF"]));
define("URL_APP", PROTOCOL . '://' . $_SERVER["HTTP_HOST"] . '/' . dirname(str_replace(basename($_SERVER["PHP_SELF"]), "", $_SERVER["PHP_SELF"])) . "/app/");
