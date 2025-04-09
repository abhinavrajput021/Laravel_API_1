<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("text",function(){
    return ["name"=>"Ram Ji",'Post'=>"God"];
});

Route::get("students",[StudentController::class,'list']);
Route::post("add",[StudentController::class,'addStudent']);

Route::post("add-student",[StudentController::class,'addStudentt']);

Route::put("update-student",[StudentController::class,'updateStudent']);

Route::delete("delete-student/{id}",[StudentController::class,'deleteStudent']);

Route::get("search-student/{name}",[StudentController::class,'searchStudent']);