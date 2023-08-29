<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($id){

        $data['exam']= Exam::findOrFail($id);
        $data['canViewStartBtn']=true;
        $user = Auth::user();
        if($user !=null)
        {
            $pivotRow= $user->exams()->where('exam_id',$id)->first();
    
            if($pivotRow !=null and $pivotRow->pivot->status=='closed' ){
                $data['canViewStartBtn']=false;
            }

        }

        return view('web.exams.show')->with($data);
    }

    public function start($examid, Request $req)  {

         $user = Auth::user();

         if(!$user->exams->contains($examid)){
            $user->exams()->attach($examid);
         }else{
            $user->exams()->updateExistingPivot($examid,[
                'status'=>'closed',
            ]);
         }
       
        $req->session()->flash('prev',"start/$examid");

         return redirect(url("exams/questions/$examid"));
    }
    public function questions($id,Request $req){
        
        if(session('prev')!="start/$id")
        {
            return redirect(url("exams/show/$id"));
        }
        $data['exam']=Exam::findOrFail($id);
        $req->session()->flash('prev',"questions/$id");

        return view('web.exams.questions')->with($data);
    }
    public function submit($examid,Request $req)  {


        if(session('prev')!="questions/$examid")
        {
            return redirect(url("exams/show/$examid"));
        }
          $req->validate([
            'answers'=>'required|array',
            'answers.*'=>'required|in:1,2,3,4'
          ]);
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

       // calculate time
       $user = Auth::user();
       $pivotRow= $user->exams()->where('exam_id',$examid)->first();
       $startTime = $pivotRow->pivot->created_at;
       $submitTime = Carbon::now();

       $timeMins=$submitTime->diffInMinutes($startTime);
       
       if($timeMins>$pivotRow->duration_mins)
       {
        $score=0;
       }

      //update pivot row
      $user->exams()->updateExistingPivot($examid,[

        'score'=>$score,
        'time_mins'=>$timeMins,
      ]);
      $req->session()->flash("success","you fininshed exam successfully with score $score");
      return redirect(url("exams/show/$examid"));
   }

    
}

