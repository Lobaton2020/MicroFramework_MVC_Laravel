<?php


class Servicer extends Authentication
{
    public function __construct()
    {
    }
    public function authentication($type = "AUTH")
    {
        parent::__construct();
        switch ($type) {
            case "AUTH":
                if (!$this->checkSession()) {
                    exit(httpResponse(403, "accessdenied", "Your Session have finished, Try to do login")->json());
                }
                break;
            default;
                exit(httpResponse(404, "errorparam", "Error param. Verify Authentication")->json());
        }
    }
}
