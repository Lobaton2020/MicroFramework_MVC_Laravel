<?php


class Controller extends Authentication
{
    public function __construct()
    {
    }
    public function authentication($type = "inside")
    {
        parent::__construct();
        switch ($type) {
            case "inside":
                if (!$this->checkSession()) {
                    redirect("auth");
                    exit();
                }
                break;
            case "outside":
                if ($this->checkSession()) {
                    redirect("main");
                    exit();
                }
                break;
            default;
                exit("Error param. Verify Authentication");
        }
    }
}
