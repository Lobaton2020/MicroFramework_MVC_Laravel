<?php
class UserController extends Controller
{
    public function __construct()
    {
        $this->authentication();
    }
    public function index()
    {
        return view("user.list", ["users" => User::all()]);
    }

    public function create()
    {
        return view("user.create");
    }

    public function edit($id = null)
    {
        return view("user.edit", ["user" => User::find($id)]);
    }

    public function update($id = null, $request)
    {
        $user = User::get($id);
        $user->nombrecompleto = $request->name;
        $user->correo = $request->email;
        $user->telefono = $request->cellphone;
        if ($user->update()) {
            return redirect("users")->with("success", "Usuario actualizado correctamente");
        } else {
            return redirect("users")->with("error", "El usuario no se pudo actualizar");
        }
    }

    public function store($request)
    {
        $user = User::save();
        $user->nombrecompleto = $request->name;
        $user->correo = $request->email;
        $user->contrasena = encrypt($request->pass);
        $user->imagen = $request->image;
        $user->telefono = $request->cellphone;
        if ($user->save()) {
            return redirect("users/create")->with("success", "Usuario creado correctamente");
        } else {
            return redirect("users/create")->with("error", "El usuario no se pudo crear");
        }
    }

    public function delete($id = null)
    {
        if (User::delete($id)) {
            return redirect("users")->with("success", "Usuario eliminado correctamente");
        } else {
            return redirect("users")->with("error", "El usuario no se pudo eliminar");
        }
    }

    public function sessionDestroy()
    {
        $this->destroySession();
        redirect("auth")->with("info", "Session cerrada correctamente.");
    }
}
