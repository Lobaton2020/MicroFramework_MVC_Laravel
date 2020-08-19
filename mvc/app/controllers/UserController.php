<?php
class UserController extends Controller
{
    public function __construct()
    {
        // $this->authentication();
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
