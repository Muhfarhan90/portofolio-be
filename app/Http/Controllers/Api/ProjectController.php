<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        return ProjectResource::collection(
            $query->latest()->paginate(10)
        );
    }

    public function store(ProjectRequest $request)
    {
        $validated = $request->validated();

        // Auto generate slug from title
        $validated['slug'] = Str::slug($validated['title']);

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

        // Auto regenerate slug when title is updated
        $validated['slug'] = Str::slug($validated['title']);

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
