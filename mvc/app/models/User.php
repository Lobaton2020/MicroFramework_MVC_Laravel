<?php


class User extends Model
{
    protected $table = "usuario";
    protected $primaryKey = "idusuario";

    public function login($email, $pass)
    {
        $user = DB::get("SELECT * FROM {$this->table} WHERE correo = :email", ["email" => $email]);
        if (!empty($user)) {
            if (verify($pass, $user->contrasena)) {
                unset($user->contrasena);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
