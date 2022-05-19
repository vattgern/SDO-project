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
            'phone' => $request['phone'],
            'password' => Hash::make($request['password'])
        ]);

        $user->roles()->attach(Role::where('slug', $role)->first());
        $user->save();
        return $user;
    }
}
