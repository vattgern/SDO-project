<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailResetRequest;
use App\Http\Requests\PassResetRequest;

class EmailAndPasswordResetController extends Controller
{
    public function emailReset(EmailResetRequest $request){
        $user = auth('sanctum')->user();
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'message' => 'Почта обновлена'
        ]);
    }

    public function passReset(PassResetRequest $request){
        $user = auth('sanctum')->user();
        $user->password = $request->password;
        $user->save();
        return response()->json([
            'message' => 'Пароль обновлён'
        ]);
    }
}
