<?php

use App\Http\Controllers\admin\CatController as AdminCatController ;
use App\Http\Controllers\admin\ExamController as AdminExamController;
use App\Http\Controllers\admin\homeController as AdminHomeController;
use App\Http\Controllers\admin\SkillController as AdminSkillController;
use App\Http\Controllers\admin\StudentController as AdminStudentController;
use App\Http\Controllers\admin\AdminController as AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


 Route::middleware('lang')->group(function (){

    Route::get('/',[HomeController::class,'index']);
    Route::get('/categories/show/{id}',[CategoryController::class,'show']);
    Route::get('/skills/show/{id}',[SkillController ::class,'show']);
    Route::get('/exams/show/{id}',[ExamController ::class,'show']); 
    Route::get('/exams/questions/{id}',[ExamController ::class,'questions'])->middleware(['auth','student']);
    Route::get('/contact',[ContactController ::class,'index']);
    Route::get('/profile',[ProfileController ::class,'index'])->middleware(['auth','student']);
    Route::post('/contact/message/send',[ContactController ::class,'send']);
 });
 
 Route::post('/exams/start/{id}',[ExamController ::class,'start'])->middleware(['auth','student','can-enter-exam']);
 Route::post('/exams/submit/{id}',[ExamController ::class,'submit'])->middleware(['auth','student']);
 Route::get('/lang/set/{lang}',[LangController ::class,'setLang']);
 
   Route::prefix('dashboard')->middleware(['auth','can-enter-dashboard'])->group(function(){

   Route::get('/',[AdminHomeController::class,'index']);


   Route::get('/categories', [AdminCatController::class , 'index']);
   Route::get('/categories/store', [AdminCatController::class , 'store']);
   Route::get('/categories/update', [AdminCatController::class , 'update']);
   Route::get('/categories/toggle/{cat}', [AdminCatController::class , 'toggle']);
   Route::get('/categories/delete/{cat}', [AdminCatController::class , 'delete']);


   Route::get('/skills', [AdminSkillController::class , 'index']);
   Route::post('/skills/store', [AdminSkillController::class , 'store']);
   Route::post('/skills/update', [AdminSkillController::class , 'update']);
   Route::get('/skills/toggle/{skill}', [AdminSkillController::class , 'toggle']);
   Route::get('/skills/delete/{skill}', [AdminSkillController::class , 'delete']);
   Route::get('/skills/add', [AdminSkillController::class , 'add']);

   Route::get('/exams', [AdminExamController::class , 'index']);

   Route::get('/exams/create', [AdminExamController::class , 'create']);
   Route::get('/exams/show/{exam}', [AdminExamController::class , 'show']);
   Route::get('/exams/show/{exam}/questions', [AdminExamController::class , 'showQuestions']);
   Route::get('/exams/create', [AdminExamController::class , 'create']);
   Route::get('/exams/create-questions/{exam}', [AdminExamController::class , 'createQuestions']);
   Route::post('/exams/store-questions/{exam}', [AdminExamController::class , 'storeQuestions']);
   Route::get('/exams/delete/{exam}', [AdminExamController::class , 'delete']);


   Route::get('/exams/edit/{id}', [AdminExamController::class , 'edit']);
   Route::post('/exams/update', [AdminExamController::class , 'update']);
   Route::get('/exams/toggle/{skill}', [AdminExamController::class , 'toggle']);
   Route::get('/exams/delete/{skill}', [AdminExamController::class , 'delete']);
   Route::get('/exams/add', [AdminExamController::class , 'add']);
   Route::post('/exams/store', [AdminExamController::class , 'store']);



    Route::get('/students',[AdminStudentController::class,'index']);
    Route::get('/students/show-scores/{id}',[AdminStudentController::class,'showScores']);
    Route::get('/students/open-exam/{studentId}/{examId}',[AdminStudentController::class,'openExam']);
    Route::get('/students/close-exam/{studentId}/{examId}',[AdminStudentController::class,'closeExam']);


    Route::get('/admins', [AdminController::class , 'index' ]);
    Route::get('/admins/create', [AdminController::class , 'create' ]);
    Route::post('/admins/store', [AdminController::class , 'store' ]);

});
