<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExcelRequest;
use App\Http\Resources\StudentResource;
use App\Imports\GroupsImport;
use App\Models\Group;
use App\Http\Requests\GroupsAndLessonsRequest;
use Maatwebsite\Excel\Facades\Excel;

class GroupController extends Controller
{
    public function newGroup(GroupsAndLessonsRequest $request){
        Group::create([
            'code' => $request->code,
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'Новая группа создана'
        ]);
    }

    public function putGroup($id, GroupsAndLessonsRequest $request){
        $group = Group::find($id);
        $group->name = $request->name;
        $group->code = $request->code;
        $group->save();

        return response()->json([
            'message' => 'Группа обновлена',
            'new_group' => $group->get()
        ]);
    }

    public function getGroup($id){
        $group = Group::findOrFail($id);
        return response()->json([
            'group' => $group
        ]);
    }

    public function getGroupByName($name){
        $group = Group::where('name', $name)->first();
        return response()->json([
            'group' => $group
        ]);
    }

    public function getGroups(){
        $groups = Group::all();
        return response()->json([
            'groups' => $groups
        ]);
    }

    public function excelImportGroups(ExcelRequest $request){
        Excel::import(new GroupsImport(), $request->file('file'));
        return response()->json(['message' => 'New groups created'], 200);
    }

    public function getStudentsByGroup($id_group){
        $group = Group::find($id_group);
        return StudentResource::collection($group->students);
    }

    public function deleteGroup($id){
        $group = Group::find($id);
        $group->delete();
        return response()->json([
            'message' => 'Group deleted'
        ]);
    }
}
