<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang($lang , Request $req){

        $allowedLang=['en','ar']; 
        if(!in_array($lang,$allowedLang))
        {
            $lang='en';
        }
        $req->session()->put('lang',$lang);

        return back();
    }
}
