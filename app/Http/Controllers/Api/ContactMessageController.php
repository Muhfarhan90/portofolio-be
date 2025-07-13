<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Http\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $contactMessages = ContactMessage::all();
        return ContactMessageResource::collection($contactMessages);
    }

    public function store(ContactMessageRequest $request)
    {
        $validated = $request->validated();

        $contactMessage = ContactMessage::create($validated);

        return (new ContactMessageResource($contactMessage))
            ->additional(['message' => 'Contact message created successfully'])
            ->response()
            ->setStatusCode(201);
    }

    public function update(ContactMessageRequest $request, ContactMessage $contactMessage)
    {
        $validated = $request->validated();

        $contactMessage->update($validated);

        return (new ContactMessageResource($contactMessage))
            ->additional(['message' => 'Contact message updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    public function show(ContactMessage $contactMessage)
    {
        return new ContactMessageResource($contactMessage);
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return response()->json(['message' => 'Contact message deleted successfully'], 200);
    }
}
