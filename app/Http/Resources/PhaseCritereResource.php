<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

    /**
     * @phaseCritere PhaseCritere $resource
     */
class PhaseCritereResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' =>$this->resource->id,
            'phase_id' =>$this->resource->phase_id,
            'critere' => [
                'id' => $this->resource->critere->id,
                'libelle' => $this->resource->critere->libelle,
                'ponderation' => $this->resource->critere->ponderation,
            ],
            'echelle' => $this->resource->echelle,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
