<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name_en'=>$this->name('en'),
            'name_ar'=>$this->name('ar'),
            'img'=>asset("uploads/$this->img"),
            'exams'=> ExamResource::collection($this->whenLoaded('exams')),

        ];
    }
}
