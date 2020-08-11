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

            $controller = $action['controller'];
            $method = $action["method"];

            require_once APP_PATH . 'controllers/' . $controller . '.php';
            $controller = new $controller();
            call_user_func_array([$controller, $method], $this->params);
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
