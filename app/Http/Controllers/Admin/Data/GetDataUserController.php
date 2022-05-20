<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParentResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Models\Users\Parents;
use App\Models\Users\Student;
use App\Models\Users\Teacher;

class GetDataUserController extends Controller
{
    public function getStudents($offset){
        return StudentResource::collection(Student::orderBy('id')->offset($offset)->limit(20)->get());
    }

    public function getStudentById($id){
        return new StudentResource(Student::findOrFail($id));
    }

    public function getStudentsByParents($id){
        return StudentResource::collection(Parents::findOrFail($id)->students);
    }

    public function getParents($offset){
        return ParentResource::collection(Parents::orderBy('id')->offset($offset)->limit(20)->get());
    }

    public function getParentById($id){
        return new ParentResource(Parents::fingOrFail($id));
    }

    public function getParentsByStudent($id){
        return ParentResource::collection(Student::fingOrFail($id)->parents);
    }

    public function getTeacher($id){
        return new TeacherResource(Teacher::findOrFail($id));
    }

    public function getTeachersById($offset){
        return TeacherResource::collection(Teacher::orderBy('id')->offset($offset)->limit(20)->get());
    }
}
