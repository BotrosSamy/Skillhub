<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
   
    public function index()
    {
        $skills=Skill::get();
        return SkillResource::collection($skills);
    }

    public function show($id)
    {
        $skill = Skill::with('exams')->findOrFail($id);
        return new SkillResource($skill);
        
    }
}
