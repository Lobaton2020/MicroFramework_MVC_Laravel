<?php


class User extends Model
{
    protected $table = "usuario";
    protected $primaryKey = "idusuario";

    public $idrol;
    public $nombrecompleto;
    public $contrasena;
    public $imagen;
    public $telefono;
}
