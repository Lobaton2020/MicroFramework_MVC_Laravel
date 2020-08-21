<?php
class AuthServicer extends Servicer
{
    public function __construct()
    {
    }

    public function index()
    {

        return httpResponse(["user" => "sdfsdf"])->json();
    }
    public function login($request)
    {
        $user = new User();
        $user = $user->login($request->email, $request->pass);
        if ($user) {
            $this->setSession([
                "id" => $user->idusuario,
                "rol" => null,
                "name" => $user->nombrecompleto,
                "email" => $user->correo
            ]);
        } else {
        }
    }
    public function getSession()
    {
        $this->sessionStart();
        return parent::getSession();
    }
    public function register()
    {
    }
    public function forgotPassword()
    {
        dd("View forgotPassword");
    }
}
