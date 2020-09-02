<?php


class User extends Model
{
    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $hidden; //campos de no mostrar

    // public function login($email, $pass)
    // {
    //     $user = DB::get("SELECT * FROM {$this->table} WHERE correo = :email", ["email" => $email]);
    //     if (!empty($user)) {
    //         if (verify($pass, $user->contrasena)) {
    //             unset($user->contrasena);
    //             return $user;
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }

    public function rol()
    {
        // return $this->hasOne("User", "idrol", "idusuario");
    }
}
