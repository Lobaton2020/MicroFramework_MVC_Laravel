<?php


class Router
{
    private static $routes = [];
    private static $params = [];

    private function __construct()
    {
    }

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
        $controller = explode('@', $location)[0];
        $method = explode('@', $location)[1];
        static::$routes[$route] = [
            'controller' => $controller,
            'method' => $method,
            'methodData' => $methodData
        ];
    }


    public static function getAction($route)
    {
        if (!empty($route)) {

            $routeAux = [$route[0], $route[1]];
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
                    throw new Exception("Error. Method request Unavailable");
                }
            }
        } else {
            throw new Exception("Error 404, Route '{$routeAux}' not found");
        }
    }

    public static function getParams()
    {
        return self::$params;
    }

    public static function tryUseThisMethod($route)
    {
        $currentRoute = null;
        foreach (self::$routes as $key => $value) {
            self::$params = [];
            $routeAux = [];
            $routeAux2 = [];
            $routeItem = $key != "/" ? explode('/', $key) : [""];
            array_shift($routeItem);
            // dd(count($route));
            for ($i = 0; $i < count($route); $i++) {
                if (isset($routeItem[$i])) {
                    array_push($routeAux, $routeItem[$i]);
                    array_push($routeAux2, $route[$i]);
                }
            }
            self::$params = $route;
            $routeAux = implode('/', $routeAux);
            $routeAux = $route !== [] ? "/" . $routeAux : $routeAux;
            $routeAux2 = "/" . implode('/', $routeAux2);
            $rout = "/" . implode("/", $route);
            if (array_key_exists($routeAux, self::$routes) && $routeAux == $routeAux2) {
                $currentRoute =   self::$routes[$routeAux];
            }
        }
        if ($currentRoute) {
            return $currentRoute;
        } else {
            throw new Exception("Error 404, Route '{$rout}' not found");
        }
    }
}
