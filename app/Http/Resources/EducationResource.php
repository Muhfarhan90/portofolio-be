<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'institution' => $this->institution,
            'degree' => $this->degree,
            'major' => $this->major,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'location' => $this->location,
            'gpa' => $this->gpa,
            'description' => $this->description,
            'is_current' => $this->is_current,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
