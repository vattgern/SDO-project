<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelRequest;
use App\Http\Resources\TeacherResource;
use App\Imports\LessonImport;
use App\Models\Lesson;
use App\Http\Requests\GroupsAndLessonsRequest;
use Maatwebsite\Excel\Facades\Excel;

class LessonController extends Controller
{
    public function getLesson($id){
        $lesson = Lesson::find($id);
        return response()->json([
           'lesson' => $lesson
        ]);
    }

    public function getLesons(){
        $lessons = Lesson::all();
        return response()->json([
            'lessons' => $lessons
        ]);
    }

    public function newLesson(GroupsAndLessonsRequest $request){
        Lesson::create([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'New lesson create'
        ]);
    }

    public function importExcelLessons(ExcelRequest $request){
        Excel::import(new LessonImport(), $request->file('file'));
        return response()->json(['message' => 'New groups created'], 200);

    }

    public function putLesson($id, GroupsAndLessonsRequest $request){
        $lesson = Lesson::find($id);
        $lesson->name = $request->name;
        $lesson->code = $request->code;
        $lesson->save();
        return response()->json([
            'message' => 'Lesson updated'
        ]);
    }

    public function getLessonByName($name){
        $lesson = Lesson::where('name' , $name)->first();
        return response()->json([
            'lesson' => $lesson
        ]);
    }

    public function deleteLesson($id){
        $lesson = Lesson::find($id);
        $lesson->delete();
        return response()->json([
            'Lesson deleted'
        ], 200);
    }

    public function getTeachersByLessons($id){
        $lesson = Lesson::find($id);
        return TeacherResource::collection($lesson->teachers);
    }
}
