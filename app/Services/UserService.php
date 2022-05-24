<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Users\Role;
use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;

class UserService extends Controller
{
    //Регистрация пользователя и его роли
    protected function userRegister(array $request, string $role){
        $user = User::create([
            'name' => $request['name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'login' => $request['login'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password'])
        ]);

        $user->roles()->attach(Role::where('slug', $role)->first());
        $user->save();
        return $user;
    }
}
