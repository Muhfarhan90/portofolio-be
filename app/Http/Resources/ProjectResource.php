<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->resource->id,
            'title'       => $this->resource->title,
            'slug'        => $this->resource->slug,
            'description' => $this->resource->description,
            'tech_stack'  => $this->resource->tech_stack,
            'repo_url'    => $this->resource->repo_url,
            'live_url'    => $this->resource->live_url,
            'image'       => $this->resource->image,
            'created_at'  => $this->resource->created_at,
            'updated_at'  => $this->resource->updated_at,
        ];
    }
}
