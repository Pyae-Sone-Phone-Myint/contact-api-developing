<?php

namespace App\Http\Controllers;

use App\Models\ContactApi;
use App\Models\SearchRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchRecordController extends Controller
{
    public function getRecords(Request $request)
    {
        // return request()->keyword;
        $records = SearchRecord::where('user_id', Auth::id())->latest('id')->limit(5)->get()->toArray();
        if(empty($records)){
            return response()->json([
                "message" => "There is no record"
            ]);
        }

        return response()->json([
            "records" => $records
        ]);
    }

    public function deleteRecords()
    {
        $user = User::find(Auth::id());
        $user->records()->delete();

        return response()->json([
            "message" => "Deleted all records"
        ]);
    }
}
