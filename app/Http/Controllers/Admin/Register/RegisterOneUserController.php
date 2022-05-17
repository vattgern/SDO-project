<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\OneParentRegistration;
use App\Http\Requests\Registration\StudentRegistration;
use App\Models\Users\Parents;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\User;

class RegisterOneUserController extends Controller
{
    public function oneStudentRegister(StudentRegistration $request){
        $student = $request->all();

        $user = User::create([
            'phone' => $student['phone'],
            'password' => $student['password']
        ]);

        $user->roles()->attach(Role::where('slug', 'student')->first());
        $user->save();

        Student::create([
            'user_id' => $user['id'],
            'name' => $student['name'],
            'middle_name' => $student['middle_name'],
            'last_name' => $student['last_name'],
            'student_cart' => $student['student_cart'],
        ]);

        return response()->json([
            'message' => 'New student create'
        ],200);
    }

    public function oneParentRegister(OneParentRegistration $request){
        $parent = $request->all();

        $user = User::create([
            'phone' => $parent['phone'],
            'password' => $parent['password']
        ]);

        $user->roles()->attach(Role::where('slug', 'parent')->first());
        $user->save();

        $new_parent = Parents::create([
            'user_id' => $user['id'],
            'name' => $parent['name'],
            'middle_name' => $parent['middle_name'],
            'last_name' => $parent['last_name'],
        ]);

        foreach ($parent['students'] as $student){
            $new_parent->students()->attach(Student::where('student_cart', $student['student_cart'])->first());
            $new_parent->save();
        }

        return response()->json([
            'message' => 'New parent create'
        ],200);
    }


}
