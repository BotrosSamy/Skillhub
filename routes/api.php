<?php

use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\ExamController;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/categories',[CatController::class,'index'] );

Route::get('/categories/show/{id}',[CatController::class,'show'] );


Route::get('/skills/show/{id}',[SkillController::class,'show'] );

Route::get('/exams/show/{id}',[ExamController::class,'show'] );
Route::get('/exams/show-questions/{id}',[ExamController::class,'showquestions'] );

Route::post('/exams/submit/{id}',[ExamController::class,'submit'] );