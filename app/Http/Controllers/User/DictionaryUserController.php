<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryUserController extends Controller
{
    public function getDictionary($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        if (!$dictionary) {
            return response()->json([
                'status' => false,
                'message' => 'Dictionary not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $dictionary
        ], 200);
    }

    public function getAllDictionary(Request $request)
    {
        $perPage = $request->input('page', 25);
        $dictionary = Dictionary::paginate($perPage);

        if (!$dictionary) {
            return response()->json([
                'status' => false,
                'message' => 'Dictionary not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Dictionaries',
            'data' => $dictionary
        ], 200);
    }
}
