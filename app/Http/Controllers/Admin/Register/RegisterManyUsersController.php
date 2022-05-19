<?php

namespace App\Http\Controllers\Admin\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\ManyParentsRegistration;
use App\Http\Requests\Registration\ManyStudentsRegistration;
use App\Http\Requests\Registration\ManyTeachersRegistration;
use App\Models\Users\Parents;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterManyUsersController extends UserService
{
    public function manyStudentsRegister(ManyStudentsRegistration $request){
        $students = $request->all()['students'];
        foreach ($students as $student){

            $user = $this->userRegister($student, 'student');

            Student::create([
                'user_id' => $user['id'],
                'name' => $student['name'],
                'middle_name' => $student['middle_name'],
                'last_name' => $student['last_name'],
                'student_cart' => $student['student_cart'],
            ]);
        }

        return response()->json(['message' => 'new students register'], 200);
    }

    public function  manyParentsRegister(ManyParentsRegistration $request){
        $parents = $request->all()['parents'];
        foreach ($parents as $parent){

            $user = $this->userRegister($parent, 'parent');

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
        }

        return response()->json([
            'message' => 'New parents create'
        ],200);
    }

    public function manyTeachersRegister(ManyTeachersRegistration $request){
        $teachers = $request->all()['teachers'];
        foreach ($teachers as $teacher){

            $user = $this->userRegister($teacher, 'teacher');

            Parents::create([
                'user_id' => $user['id'],
                'name' => $teacher['name'],
                'middle_name' => $teacher['middle_name'],
                'last_name' => $teacher['last_name']
            ]);
        }
        return response()->json([
            'message' => 'New parent create'
        ],200);
    }
}
