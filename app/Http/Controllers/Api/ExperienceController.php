<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $query = Experience::query();
        if ($search = $request->query('search')) {
            $query->where('company_name', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        }
        return ExperienceResource::collection(
            $query->latest()->paginate(10)
        );
    }

    public function store(ExperienceRequest $request)
    {
        $validated = $request->validated();

        $experience = Experience::create($validated);

        return (new ExperienceResource($experience))
            ->additional(['message' => 'Experience created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(ExperienceRequest $request, Experience $experience)
    {
        $validated = $request->validated();

        $experience->update($validated);

        return (new ExperienceResource($experience))
            ->additional(['message' => 'Experience updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    public function show(Experience $experience)
    {
        return new ExperienceResource($experience);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json(['message' => 'Experience deleted successfully'], 200);
    }
}
