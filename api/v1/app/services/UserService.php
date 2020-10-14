<?php
class UserService extends Service implements ICrud
{
    public function __construct()
    {
        $this->authentication();
    }
    public function index($request = null)
    {
        return httpResponse(
            User::paginate($request),
            User::infoPaginate("users")
        )->json();
    }

    public function store($request = null, $files =  null)
    {

        $user = User::create();
        $user->nombrecompleto = $request->name;
        $user->correo = $request->correo;
        $user->contrasena = encrypt($request->clave);
        $user->imagen = $request->avatar;
        $user->telefono = $request->tel;
        if ($user->save()) {
            return httpResponse(200, "success", "User created successfully.")->json();
        } else {
            return httpResponse(500, "error", "Error user not created")->json();
        }
    }

    public function edit($id = null)
    {
        return  httpResponse(User::find($id))->json();
    }
    public function update($request = null, $files = null)
    {
        return httpResponse($request)->json();
    }
    public function delete($id = null)
    {
        if (User::delete($id)) {
            return httpResponse(200, "success", "User deleted successfully.")->json();
        } else {
            return httpResponse(500, "error", "Error user not deleted")->json();
        }
    }
}
