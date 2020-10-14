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

    public static function put($route, $location)
    {
        self::add("PUT", $route, $location);
    }

    public static function delete($route, $location)
    {
        self::add("DELETE", $route, $location);
    }

    public static function add($methodHttp, $route, $location)
    {
        if (gettype($location) === "object") {
            static::$routes[$route] = [
                'callback' => $location,
                'methodHttp' => self::addMethodHttp(self::$routes,$route,$methodHttp)
            ];
        } else {

            $controller = explode('@', $location)[0];
            $method = explode('@', $location)[1];
            static::$routes[$route] = [
                'controller' => $controller,
                'method' => $method,
                'methodHttp' => self::addMethodHttp(self::$routes,$route,$methodHttp)
            ];
        }
    }
    private static function addMethodHttp($routes,$route,$methodHttp){
        if(isset($routes[$route])){
            if(!in_array($methodHttp,$routes[$route]["methodHttp"])){
                array_push($routes[$route]["methodHttp"],$methodHttp);
                return $routes[$route]["methodHttp"];
            }
        }
        return [$methodHttp];

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
            $method_http = $_SERVER["REQUEST_METHOD"];
            switch ($method_http) {
                case "GET":
                    return self::verifyRequest($routeAux, "GET");
                    break;
                case "POST":
                    return self::verifyRequest($routeAux, "POST");
                    break;
                case "PUT":
                    return self::verifyRequest($routeAux, "PUT");
                    break;
                case "DELETE":
                    return self::verifyRequest($routeAux, "DELETE");
                    break;
                default:
                    exit(httpResponse(405, "error", "Method request '{$_SERVER["REQUEST_METHOD"]}' is unsuported in this app")->json());
            }
        } else {
            exit(httpResponse(404, "error", "Route '{$routeAux}' not found")->json());
        }
    }

    private static function verifyRequest($routeAux, $method)
    {
        if (in_array($method,self::$routes[$routeAux]["methodHttp"])) {
                /**
                 * Support method PUT - DELETE - GET
                 * Ways of receive data:
                 * 1."name=juan&lastname=lopez"
                 * 2.JSON as string "{name:"juan", lastname:"lopez""
                 */
                $other_method_data =  json_decode(file_get_contents('php://input'),true);
                if($other_method_data === null){
                     parse_str(file_get_contents('php://input'),$other_method_data);
                }
                self::$params[] = isset($other_method_data) ? (object)$other_method_data : [];
                self::$params[] = isset($_FILES) ? $_FILES : [];
                self::$params[] = isset($other_method_data["id"]) ? $other_method_data["id"] : [];

            return self::$routes[$routeAux];
        }
        return false;
    }

    public static function getParams()
    {
        return self::$params;
    }
}
