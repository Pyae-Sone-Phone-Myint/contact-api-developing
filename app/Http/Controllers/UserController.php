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
        $favoriteContacts = $user->favorites->toArray();
        if (empty($favoriteContacts)) {
            return response()->json([
                "message" => "There is no favorite contact"
            ]);
        }

        return response()->json(['favorites' => $favoriteContacts], 200);
    }

    public function addFavoriteContact($id)
    {
        $user = User::find(Auth::id());
        $contact = ContactApi::find($id);
        // $contact->is_favorite;
        // return $user->id;


        if (is_null($contact)) {
            return response()->json([
                // "success" => false,
                "message" => "Contact not found",
            ], 404);
        }

        // Check if the contact is already in the user's favorites
        if ($user->favorites->contains($contact)) {
            $contact->update([
                "is_favorite" => false
            ]);
            $user->favorites()->detach($contact);
            return response()->json(['message' => 'remove contact successfully'], 422);
        }

        if ($user->id != $contact->user_id) {
            return response()->json([
                'message' => "You are not allowed"
            ]);
        }



        $contact->update([
            "is_favorite" => true,
        ]);
        // Add the contact to the user's favorites
        $user->favorites()->attach($contact);


        return response()->json(['message' => 'Contact added to favorites successfully.'], 200);
    }

    // public function removeFavoriteContact($id)
    // {
    //     $user = User::find(Auth::id());
    //     $contact = ContactApi::find($id);

    //     if ($user->id != $contact->user_id) {
    //         return response()->json([
    //             'message' => "You are not allowed"
    //         ]);
    //     }

    //     $user->favorites()->detach($contact);
    //     return response()->json([
    //         "message" => "remove contact successfully"
    //     ]);
    //     // return $user->favorites->pluck('id')->toArray();

    // }
}
