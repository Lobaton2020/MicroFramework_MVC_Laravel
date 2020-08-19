<?php


class Router
{
    private static $routes = [];
    private static $params = [];

    public static function post($route, $location)
    {
        self::add("POST", $route, $location);
    }

    public static function get($route, $location)
    {
        self::add("GET", $route, $location);
    }

    public static function add($methodData, $route, $location)
    {
        if (gettype($location) === "object") {
            static::$routes[$route] = [
                'callback' => $location,
                'methodData' => $methodData
            ];
        } else {

            $controller = explode('@', $location)[0];
            $method = explode('@', $location)[1];
            static::$routes[$route] = [
                'controller' => $controller,
                'method' => $method,
                'methodData' => $methodData
            ];
        }
    }


    public static function getAction($route)
    {
        if (!empty($route)) {
            $routeAux = isset($route[1]) ? [$route[0], $route[1]] : [$route[0]];
            $routeAux = "/" . implode("/", $routeAux);
            array_shift($route);
            array_shift($route);
        } else {
            $routeAux = "/";
        }

        if (array_key_exists($routeAux, self::$routes)) {
            self::$params = $route;
            if (self::$routes[$routeAux]["methodData"] === "GET") {
                return self::$routes[$routeAux];
            } else {
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (!empty($_POST) && isset($_POST["id"])) {
                        self::$params[] = $_POST["id"];
                    }
                    if (!empty($_POST)) {
                        self::$params[] = (object)$_POST;
                    }
                    return  self::$routes[$routeAux];
                } else {
                    exit(httpResponse(404, "error", "Method request 'GET' Unavailable")->json());
                }
            }
        } else {
            exit(httpResponse(404, "error", "Route '{$routeAux}' not found")->json());
        }
    }

    public static function getParams()
    {
        return self::$params;
    }
}
