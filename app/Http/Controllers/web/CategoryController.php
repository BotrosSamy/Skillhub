<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //
    public function show($id)
    {
        $data['cat']= Cat::findorfail($id);
        $data['allCat']= Cat::select('id','name')->get();
        $data['skills']=$data['cat']->skills()->paginate(6);
    
        return view('web.cats.show')->with($data);
    }
}
