<?php

class AuthService extends Service
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->sessionStart();
        $this->initCredentials();
        return $this->getSession();
    }

    public function login($request = null)
    {
        $this->sessionStart();
        $this->initCredentials();
        $user = new User();
        $user = $user->login($request->email, $request->pass);
        if ($user) {
            $this->setSession([
                "id" => $user->idusuario,
                "rol" => null,
                "name" => $user->nombrecompleto,
                "email" => $user->correo
            ]);
            return $this->getSession();
        } else {
            return httpResponse(401, "loggin", "Error your credentials are incorrects")->json();
        }
    }
    public function destroy()
    {
        if ($this->destroySession()) {
            return httpResponse(200, "ok", "Your session is finishied")->json();
        } else {
            return httpResponse(500, "Error, session not destroy")->json();
        }
    }
}
