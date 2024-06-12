<?php
namespace Library\Controllers\Users;

use Library\Core\Controller;
use Library\Models\User;


class AuthController extends Controller
{
    public function __invoke($request): array
    {
        $user = (new User())->findBy('email', $request['email']);
        if($user){
            if(password_verify($request['password'], $user->password)){
                return ['status' => 'ok', 'user_id' => $user->id];
            }
            return ['status' => 'error', 'message' => 'Неверный пароль'];
        }
        return ['status' => 'error', 'message' => 'Такого пользователя не существует'];
    }
}