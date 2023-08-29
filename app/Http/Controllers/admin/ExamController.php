<?php

namespace App\Http\Controllers\admin;

use App\Events\ExamAddedEvent;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index()
    {

    $data['exams']=Exam::select('id','name','skill_id','img','question_no','active')
    ->orderby('id','desc')->paginate(10);

    return view("admin.exams.index")->with($data);
    }

    public function show(Exam $exam)  {
        

        $data['exam']=$exam;
        return view("admin.exams.show")->with($data);
    }
    
    public function showQuestions(Exam $exam)  {
        

        $data['exam']=$exam;
        return view("admin.exams.show-questions")->with($data);
    }

    public function create()
    {
        $data['skills']= Skill::orderby('id','desc')->get();
        
        return view("admin.exams.create")->with($data);
    }


    public function store(Request $request){


        $request->validate(
            [
             
                'name_en' =>'required|string|max:50',
                'name_ar' =>'required|string|max:50',
                'desc_en' =>'required|string|max:5000',
                'desc_ar' =>'required|string|max:5000',
                'skill_id'=> 'required|exists:skills,id',
                'diffculty'=>'required|Integer|min:1|max:5',
                'question_no'=>'required|Integer',
                'duration'=>'required|min:1',

            ]);

            if ($request->hasFile('img')) {
            
                $path=Storage::putFile("exams",$request->file('img'));
            }else{
                $path='null';
            }
          

           $exam= Exam::create([
                'name' =>json_encode([
                    'en' => $request->name_en,
                    'ar' => $request->name_ar,
                   
                ]),
                'desc' =>json_encode([
                    'en' => $request->desc_en,
                    'ar' => $request->desc_ar,
                   
                ]),
                'img'=>$path,

                'skill_id'=>$request->skill_id,
                
                'difficulty'=>$request->diffculty,
                
                'question_no'=>$request->question_no,
                'duration_mins'=>$request->duration,
                'active'=>0,

            ]);
   

            $request->session()->flash('prev' , "exam/$exam->id");
            return redirect(url("dashboard/exams/create-questions/{$exam->id}"));

        
            
        
    }

    public function createQuestions(Exam $exam)  {
        
        if(session("prev")!=="exam/$exam->id")
        {
            return redirect(url("dashboard/exams"));
        }
        $data['exam_id']=$exam->id;
        $data['question_no'] = $exam->question_no;

        return view("admin.exams.create-questions")->with($data);
    }

    public function storeQuestions(Exam $exam,Request $request)  {

      

        $request->validate([
         'titles'=>'required|array',
         'titles.*'=>'required|string|max:500',
         'right_ans'=>'required|array',
         'right_ans.*'=>'required|in:1,2,3,4,',         
         'option_1s'=>'required|array',
         'option_1s.*'=>'required|string|max:255',
         'option_2s'=>'required|array',
         'option_2s.*'=>'required|string|max:255',
         'option_3s'=>'required|array',
         'option_3s.*'=>'required|string|max:255',
         'option_4s'=>'required|array',
         'option_4s.*'=>'required|string|max:255',
        ]);


        for ($i=0; $i < $exam->question_no; $i++) { 
           Question::create([
            'exam_id'=>$exam->id,
            'title' => $request->titles[$i],
            'right_ans' => $request->right_ans[$i],
            'option_1' => $request->option_1s[$i],
            'option_2' => $request->option_2s[$i],
            'option_3' => $request->option_3s[$i],
            'option_4' => $request->option_4s[$i],

           ]);
        }

           $exam->update([

            'active' => 1,

           ]);
           event(new ExamAddedEvent);

           return redirect(url("dashboard/exams"));
            
        }
        


        
    public function delete(Exam $exam , Request $request)
    {
        try{


            
            $path= $exam->img;

           // dd($path);
            $exam->delete();
            Storage::delete($path);
     
        
            $msg ="row deleted successfully";

        }
        catch (Exception $e){
                    $msg = "cant delete";
                }

        $request->session()->flash('success', $msg);
        return back();
    }
    }



