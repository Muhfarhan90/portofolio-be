<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $query = Certificate::query();
        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('issuer', 'like', "%{$search}%");
        }
        return CertificateResource::collection(
            $query->latest()->paginate(10)
        );
    }

    public function store(CertificateRequest $request)
    {
        $validated = $request->validated();

        $certificate = Certificate::create($validated);

        return (new CertificateResource($certificate))
            ->additional(['message' => 'Certificate created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(CertificateRequest $request, Certificate $certificate)
    {
        $validated = $request->validated();

        $certificate->update($validated);

        return (new CertificateResource($certificate))
            ->additional(['message' => 'Certificate updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    public function show(Certificate $certificate)
    {
        return new CertificateResource($certificate);
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return response()->json(['message' => 'Certificate deleted successfully'], 200);
    }
}
