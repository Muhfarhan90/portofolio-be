<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return ProjectResource::collection($projects);
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = asset('storage/' . $imagePath);
        }

        $project = Project::create($validated);

        return (new ProjectResource($project))
            ->additional(['message' => 'Project created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = asset('storage/' . $imagePath);
        } else {
            $validated['image'] = $project->image;
        }

        $project->update($validated);

        return (new ProjectResource($project))
            ->additional(['message' => 'Project updated successfully'])->response()
            ->setStatusCode(200);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully'], 200);
    }
}
