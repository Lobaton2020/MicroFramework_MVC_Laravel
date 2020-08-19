<?php


class App
{
    protected $controller = "AuthController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {

        $url = $this->getUrl();
        try {
            $action = Router::getAction($url);
            $this->params = Router::getParams();
            if (isset($action["callback"])) {
                $action["callback"](new Controller());
            } else {

                $controller = $action['controller'];
                $method = $action["method"];
                if (file_exists(APP_PATH . 'controllers/' . $controller . '.php')) {
                    require_once APP_PATH . 'controllers' . SEPARATOR . $controller . '.php';

                    if (class_exists($controller)) {
                        $controller = new $controller();
                        if (method_exists($controller, $method)) {
                            echo (call_user_func_array([$controller, $method], $this->params));
                        } else {
                            exit(httpResponse(404, "error", "Method Controller not found")->json());
                        }
                    } else {
                        exit(httpResponse(404, "error", "Class Controller not found")->json());
                    }
                } else {
                    exit(httpResponse(404, "error", "File Controller not found")->json());
                }
            }
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    private function getUrl()
    {
        $url = [];
        if (isset($_GET["url"])) {
            $url = trim($_GET["url"]);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
        }
        return $url;
    }
}
