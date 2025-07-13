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
        $certificates = Certificate::latest()->paginate(10);
        return CertificateResource::collection($certificates);
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
