<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $educations = Education::latest()->paginate(10);
        return EducationResource::collection($educations);
    }

    public function store(EducationRequest $request)
    {
        $validated = $request->validated();

        $education = Education::create($validated);

        return (new EducationResource($education))
            ->additional(['message' => 'Project created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(EducationRequest $request, Education $education)
    {
        $validated = $request->validated();

        $education->update($validated);

        return (new EducationResource($education))
            ->additional(['message' => 'Project updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    public function show(Education $education)
    {
        return new EducationResource($education);
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json(['message' => 'Education deleted successfully'], 200);
    }
}
