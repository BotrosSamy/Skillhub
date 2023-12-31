<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use QCod\ImageUp\HasImageUploads;

class Skill extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    use HasFactory;

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function name($lang=null)
    {
        $lang =$lang?? App::getLocale();

        return json_decode($this->name)->$lang;
    }

    public function getUser()  {

        $studentNum=  0;

        foreach($this->exams as $exam){
            $studentNum += $exam->users()->count();
          
        }
        return $studentNum;
        

        
    }
    
}
