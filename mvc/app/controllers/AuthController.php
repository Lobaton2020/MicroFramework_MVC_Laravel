<?php
class AuthController extends Controller
{
    public function __construct()
    {
        $this->authentication("outside");
    }

    public function index()
    {
        return view("auth.login", [], false);
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
            redirect("users");
        } else {
            redirect("auth")->with("error", "Error de auntenticacion");
        }
    }

    public function register()
    {
        if (sessionExist("info")) {
            echo session("info");
        }
    }
    public function forgotPassword()
    {
        dd("View forgotPassword");
    }
}
