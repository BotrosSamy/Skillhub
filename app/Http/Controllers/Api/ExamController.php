<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ExamController extends Controller
{


   public function show($id)  {
    
    $exam= Exam::findOrFail($id);
    return new ExamResource($exam);
   }


   public function showquestions($id)  {
    
    $exam= Exam::with('questions')->findOrFail($id);
    return new ExamResource($exam);
   }


   public function submit($examid,Request $req)  {


       $validator = FacadesValidator::make($req->all(),[
            'answers'=>'required|array',
            'answers.*'=>'required|in:1,2,3,4'

       ]);

  if($validator->fails()){
            return response()->json($validator->errors());
   }

    
        //calculate score

        $points= 0 ;
        $exam= Exam::findOrFail($examid);
        $totalQuesNum =$exam->questions->count();

        foreach ($exam->questions as $question) {
            if(isset($req->answers[$question->id])){
                $studenAns= $req->answers[$question->id];
                $rightAns= $question->right_ans;
                if($studenAns==$rightAns)
                {
                    $points+=1;
                }

            }
        }
        $score= ($points/$totalQuesNum)*100;

        return response()->json($score);

    // calculate time
    // $user = Auth::user();
    // $pivotRow= $user->exams()->where('exam_id',$examid)->first();
    // $startTime = $pivotRow->pivot->created_at;
    // $submitTime = Carbon::now();

    // $timeMins=$submitTime->diffInMinutes($startTime);
    
    // if($timeMins>$pivotRow->duration_mins)
    // {
    //     $score=0;
    // }

    // //update pivot row
    // $user->exams()->updateExistingPivot($examid,[

    //     'score'=>$score,
    //     'time_mins'=>$timeMins,
    // ]);
    // $req->session()->flash("success","you fininshed exam successfully with score $score");
    // return redirect(url("exams/show/$examid"));
  }
}
