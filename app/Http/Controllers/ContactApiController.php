<?php

namespace App\Http\Controllers;

use App\Models\ContactApi;
use App\Http\Requests\StoreContactApiRequest;
use App\Http\Requests\UpdateContactApiRequest;
use App\Http\Resources\ContactApiResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactApi::latest('id')->paginate(5)->withQueryString();

        // return response()->json([
        //     "message" => $contacts
        // ]);

        return ContactApiResource::collection($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactApiRequest $request)
    {
        $request->validate([
            "name" => "required",
            "country_code" => "required|min:1|max:193",
            "phone_number" => "required",
        ]);

        $contact = ContactApi::create([
            "name" => $request->name,
            "country_code" => $request->country_code,
            "phone_number" => $request->phone_number,
            "user_id" => Auth::id(),
        ]);

        return response()->json([
            "message" => "success",
            "data" => $contact
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactApi $contactApi, string $id)
    {
        $contact = ContactApi::find($id);
        // return $contactApi->id();
        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",
            ], 404);
        }

        if (Gate::denies('view', $contact)) {
            return response()->json([
                "message" => "You are not allowed"
            ]);
        }

        return response()->json([
            "message" => "success",
            "data" => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactApiRequest $request, ContactApi $contactApi, string $id)
    {
        $request->validate([
            "name" => "nullable|min:1|max:20",
            "country_code" => "nullable|integer|min:1|max:193",
            "phone_number" => "nullable|min:7|max:15",
        ]);

        $contact = ContactApi::find($id);

        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",

            ], 404);
        }

        if (Gate::denies('update', $contact)) {
            return response()->json([
                "message" => "You are not allowed"
            ]);
        }

        $contact->update([
            "name" => $request->name,
            "country_code" => $request->country_code,
            "phone_number" => $request->phone_number
        ]);

        return response()->json([
            "message" => "success",
            "data" => $contact
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactApi $contactApi, string $id)
    {
        $contact = ContactApi::find($id);
        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",
            ], 404);
        }

        if (Gate::denies('delete', $contact)) {
            return response()->json([
                "message" => "You are not allowed"
            ]);
        }
        $contact->delete();
        return response()->json([
            "message" => "contact removed"
        ]);
    }

    public function forceDelete(string $id)
    {
        $contact = ContactApi::withTrashed()->find($id);
        // return $contact;
        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",
            ], 404);
        }
        if (Gate::denies('forceDelete', $contact)) {
            return response()->json([
                "message" => "You are not allowed"
            ]);
        }
        $contact->forceDelete();

        return response()->json([
            "message" => "Contact deleted successfully"
        ]);
    }

    public function restore(string $id)
    {
        $contact = ContactApi::withTrashed()->find($id);
        if (Gate::denies('restore', $contact)) {
            return response()->json([
                "message" => "You are not allowed"
            ]);
        }
        $contact->restore();

        return response()->json([
            "message" => "Contact restored"
        ]);
    }
}
