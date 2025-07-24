<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $query = Skill::query();

        if ($search = $request->query('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        }

        return SkillResource::collection(
            $query->latest()->paginate(10)
        );
    }

    public function store(SkillRequest $request)
    {
        $validated = $request->validated();

        $skill = Skill::create($validated);

        return (new SkillResource($skill))
            ->additional(['message' => 'Skill created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();

        $skill->update($validated);

        return (new SkillResource($skill))
            ->additional(['message' => 'Skill updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted successfully'], 200);
    }
}
