<?php
namespace Library\Controllers\Users;

use Library\Core\Controller;
use Library\Models\User;

class NewController extends Controller
{
    public function __invoke($request): array
    {
        $user = new User();
        
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->middle_name = $request['middlename'];
        $user->email = $request['email'];
        $user->password = password_hash($request['password'], PASSWORD_DEFAULT);
        $user->created_at = '2024-01-01 00:00';
        $flag = $user->save();
        return $flag ? ['status' => 'ok'] : ['status' => 'error'];
    }
}