<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "questions"=> [
                "id"=>$this->id,
                "question"=> $this->question,
            ],
            "assertions"=> QuestionAssertionResource::collection($this->assertion),
            // 'evenement'=>new PhaseEventResource($this->resource->evenement)
        ];
    }
}
