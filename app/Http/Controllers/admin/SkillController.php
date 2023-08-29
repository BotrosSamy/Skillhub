<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    //
    public function index()
    {
        $data['skills']=Skill::orderby('id', 'DESC')->paginate(10);
        $data['cats']=Cat::select('id','name')->get();
        return view("admin.skills.index")->with($data);
    }


    public function add(){
       
        $data['skills']=Skill::orderby('id', 'DESC')->paginate(10);
        $data['cats']=Cat::select('id','name')->get();
        return view("admin.skills.add")->with($data);
    }

    public function store(Request $request)
     {

     
        $request->validate(
            [
                'name_en' =>'required|string|max:50',
                'name_ar' =>'required|string|max:50',
                'img' => 'required|max:2084',
                'cat_id'=> 'required|exists:cats,id',

            ]);
            

           $path = Storage::putFile("skills",$request->file('img'));
     

            Skill::create([
                'name' =>json_encode([
                    'en' => $request->name_en,
                    'ar' => $request->name_ar,
                   
                ]),
                'cat_id'=>$request->cat_id,
                'img'=>$path,
            ]);

            $request->session()->flash('success' , 'row added successfully');
            return back();
     }



    
    public function update(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|exists:skills,id',
                'name_en' =>'required|string|max:50',
                'name_ar' =>'required|string|max:50',
                'img' => 'required|max:2084',
                'cat_id'=> 'required|exists:cats,id',

            ]);
           $skill= Skill::findOrFail($request->id);
           $path =$skill->img;

           if($request->hasFile('img')){

            Storage::delete($path);
            Storage::putFile("skills",$request->file('img'));


           }



            $skill->update([
                'name' =>json_encode([
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ]),
                'cat_id'=>$request->cat_id,
                'img'=>$path,
            ]);


            $request->session()->flash('success' , 'row updated successfully');
            return back();
    }


    public function delete(Skill $skill , Request $request)
    {
        try{


            // dd($request->all());
            $path= $skill->img;

            //dd($path);
            $skill->delete();
            Storage::delete($path);
        
            $msg ="row deleted successfully";

        }
        catch (Exception $e){
                    $msg = "cant delete";
                }

        $request->session()->flash('success', $msg);
        return back();
    }


    public function toggle(Skill $skill)
    {

        $skill->update([
            'active' =>!$skill->active,
        ]);

        return back();
    }

}
