<?php
class UserController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view("user.list", ["user" => User::all()]);
    }

    public function create()
    {
    }

    public function edit($id = null)
    {
        return view("index", ["user" => User::find($id)]);
    }

    public function update($id = null)
    {
        $user = User::get($id);
        $user->nombrecompleto = "Wowww";
        $user->correo = "Joooo@gmal.com";
        $user->idrol = "4";
        if ($user->update()) {
            echo "Actualizado";
        } else {
            echo "Error";
        }
    }

    public function store($request)
    {
        $user = User::save();
        $user->idrol = "1";
        $user->nombrecompleto = "Juauauau   ";
        $user->correo = "ajauauauauau@gm.com";
        $user->contrasena = "12345";
        $user->imagen = "/asajsh/ashajsh/aas.kjp";
        $user->telefono = "156a4444456565";
        if ($user->save()) {
            echo "Insertado";
        } else {
            echo "Error";
        }
    }

    public function delete($id = null)
    {
        if (User::delete($id)) {
            echo "Eliminado";
        } else {
            echo "Error";
        }
    }
}
