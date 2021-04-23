<?php

use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Student Route //
Route::get('students', [StudentController::class, 'index']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::post('students', [StudentController::class, 'store']);
Route::post('students/{id}', [StudentController::class, 'update']);
Route::delete('students/{id}', [StudentController::class, 'destroy']);

// Teacher Route //
Route::get('teachers', [TeacherController::class, 'index']);
Route::get('teachers/{id}', [TeacherController::class, 'show']);
Route::post('teachers', [TeacherController::class, 'store']);
Route::post('teachers/{id}', [TeacherController::class, 'update']);
Route::delete('teachers/{id}', [TeacherController::class, 'destroy']);

// Classroom Route //
Route::get('classrooms', [ClassroomController::class, 'index']);
Route::get('classrooms/{id}', [ClassroomController::class, 'show']);
Route::post('classrooms', [ClassroomController::class, 'store']);
Route::post('classrooms/{id}', [ClassroomController::class, 'update']);
Route::delete('classrooms/{id}', [ClassroomController::class, 'destroy']);
