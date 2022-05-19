<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Register\RegisterOneUserController;
use App\Http\Controllers\Admin\Register\RegisterManyUsersController;
use App\Http\Controllers\Admin\Register\RegisterExcelUsersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Регистрация групп пользователей: по одному, списком и через импорт excel таблицы
Route::group([], function (){
    Route::post('/one/student', [RegisterOneUserController::class, 'oneStudentRegister']);
    Route::post('/one/parent', [RegisterOneUserController::class, 'oneParentRegister']);
    Route::post('/one/teacher',[RegisterOneUserController::class, 'oneTeacherRegister']);
    Route::post('/many/students', [RegisterManyUsersController::class, 'manyStudentsRegister']);
    Route::post('/many/parents', [RegisterManyUsersController::class, 'manyParentsRegister']);
    Route::post('/many/teachers', [RegisterManyUsersController::class, 'manyTeachersRegister']);
    Route::post('/excel/students', [RegisterExcelUsersController::class, 'excelRegisterStudents']);
    Route::post('/excel/parents', [RegisterExcelUsersController::class, 'excelRegisterParents']);
    Route::post('/excel/teachers', [RegisterExcelUsersController::class, 'excelRegisterTeachers']);
});

