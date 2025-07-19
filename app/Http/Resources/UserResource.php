<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'bio' => $this->resource->bio,
            'address' => $this->resource->address,
            'phone_number' => $this->resource->phone_number,
            'github_url' => $this->resource->github_url,
            'linkedin_url' => $this->resource->linkedin_url,
            'instagram_url' => $this->resource->instagram_url,
            'website_url' => $this->resource->website_url,
            'image' => $this->resource->image,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
