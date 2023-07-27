<?php

namespace App\Http\Controllers;

use App\Models\ContactApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getFavoriteContacts()
    {
        $user = User::findOrFail(Auth::id());

        // Retrieve the favorite contacts for the given user
        $favoriteContacts = $user->favorites;

        return response()->json(['favorites' => $favoriteContacts], 200);
    }

    public function addFavoriteContact($id)
    {
        $user = User::find(Auth::id());
        $contact = ContactApi::find($id);
        // return $contact;
        // return $user->id;


        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",
            ], 404);
        }

        // Check if the contact is already in the user's favorites
        if ($user->favorites->contains($contact)) {
            return response()->json(['message' => 'Contact is already in favorites.'], 422);
        }

        if ($user->id != $contact->user_id) {
            return response()->json([
                'message' => "You are not allowed"
            ]);
        }

        // Add the contact to the user's favorites
        $user->favorites()->attach($contact);

        return response()->json(['message' => 'Contact added to favorites successfully.'], 200);
    }

    public function removeFavoriteContact($id)
    {
        $user = User::find(Auth::id());
        $contact = ContactApi::find($id);

        if ($user->id != $contact->user_id) {
            return response()->json([
                'message' => "You are not allowed"
            ]);
        }

        $user->favorites()->detach($contact);
        return response()->json([
            "message" => "remove contact successfully"
        ]);
        // return $user->favorites->pluck('id')->toArray();

    }
}
