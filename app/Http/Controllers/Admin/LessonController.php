<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

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

    public function newLesson(Request $request){
        Lesson::create([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'New lesson create'
        ]);
    }

    public function putLesson($id, Request $request){
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
}
