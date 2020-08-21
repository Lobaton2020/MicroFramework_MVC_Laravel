<?php
class UserServicer extends Servicer
{
    public function __construct()
    {
        // $this->authentication();
    }
    public function save($id = null, $request = null, $files = null)
    {
        // DD($_SERVER["REQUEST_METHOD"]);
        dd($request, [], FALSE);
        dd($files);
    }
    public function index()
    {
        return httpResponse(["users" => User::all()])->json();
    }

    public function edit($id = null)
    {
        return httpResponse(["user" => User::find($id)])->json();
    }
}
