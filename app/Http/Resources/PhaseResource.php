<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Phase;

class PhaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "phases"=>[
                'id' => $this->id,
                'nom' => $this->nom,
                'description' => $this->description,
                'date_debut' => $this->date_debut,
                'date_fin' => $this->date_fin, 
                'type'=> $this->type,
                'slug'=> $this->slug,
                'duree'=> $this->duree,
                'evenement_id'=> $this->evenement_id,
            ],
            'evenement'=>new PhaseEventResource($this->resource->evenement)
        ];
    }
}
