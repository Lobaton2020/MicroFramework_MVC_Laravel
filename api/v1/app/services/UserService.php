<?php
class UserService extends Service implements ICrud
{
    public function __construct()
    {
        // $this->authentication();
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
        dd($request, [], FALSE);
        dd($files);
    }

    public function edit($id = null)
    {
        return dd(User::findT($id)->get());
    }
    public function update($request = null, $files = null)
    {
    }
    public function delete($id = null)
    {
    }
}
