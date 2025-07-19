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
            'id' => $this->resource->id,
            'institution' => $this->resource->institution,
            'degree' => $this->resource->degree,
            'major' => $this->resource->major,
            'start_year' => $this->resource->start_year,
            'end_year' => $this->resource->end_year,
            'location' => $this->resource->location,
            'gpa' => $this->resource->gpa,
            'description' => $this->resource->description,
            'is_current' => $this->resource->is_current,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
