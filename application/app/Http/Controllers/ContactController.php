<?php

namespace App\Http\Controllers;

use App\DTO\ContactData;
use App\Services\Contact\ContactService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, ContactService $service): JsonResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:contacts,email',
            'phone'    => 'nullable|string|max:32',
            'source'   => 'nullable|in:lead,account',
            'company'  => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        $dto = ContactData::fromArray($validated + [
                'source' => $validated['source'] ?? 'lead',
            ]);

        $contact = $service->createFromSource($dto->getSource(), $dto);

        return response()->json($contact, 201);
    }
}
