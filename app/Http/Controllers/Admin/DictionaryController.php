<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class DictionaryController extends Controller
{
    public function createDictionary(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'bahasa_dayak' => 'required|string',
            'terjemahan' => 'required|string',
            'audio' => 'file|mimes:mp3,wav,ogg,aac,flac,m4a',
            'id_bab' => 'required|exists:chapters,id'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            try {
                $uploadedFileUrl = cloudinary()->uploadFile($request->file('audio')->getRealPath())->getSecurePath();

                $dictionary = Dictionary::create([
                    'bahasa_dayak' => $request->bahasa_dayak,
                    'terjemahan' => $request->terjemahan,
                    'audio' => $uploadedFileUrl,
                    'id_bab' => $request->id_bab
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Dictionary created successfully',
                    'data' => $dictionary
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function getDictionary($id)
    {
        $dictionary = Dictionary::with(['chapter'])->findOrFail($id);

        if (!$dictionary) {
            return response()->json([
                'status' => false,
                'message' => 'Dictionary not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'kamus' => $dictionary
        ], 200);
    }

    public function getAllDictionary(Request $request)
    {
        $perPage = $request->input('page', 25);
        $dictionary = Dictionary::with(['chapter'])->paginate($perPage);

        if (!$dictionary) {
            return response()->json([
                'status' => false,
                'message' => 'Dictionary not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Dictionaries',
            'kamus' => $dictionary
        ], 200);
    }

    public function editDictionary($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'bahasa_dayak' => 'string',
            'terjemahan' => 'string',
            'audio' => 'file|mimes:mp3,wav,ogg,aac,flac,m4a',
            'id_bab' => 'exists:chapters,id'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $dictionary = Dictionary::findOrFail($id);
            if (!$dictionary) {
                return response()->json([
                    'status' => false,
                    'message' => 'Dictionary not found'
                ], 404);
            }

            $dictionary->bahasa_dayak = $request['bahasa_dayak'];
            $dictionary->terjemahan = $request['terjemahan'];
            $dictionary->id_bab = $request['id_bab'];
            if ($request->hasFile('audio')) {
                $uploadedFileUrl = cloudinary()->uploadFile($request->file('audio')->getRealPath())->getSecurePath();
                $dictionary->audio = $uploadedFileUrl;
            }

            $dictionary->save();

            return response()->json([
                'success' => true,
                'message' => 'Dictionary updated successfully',
                'kamus' => $dictionary
            ], 200);
        }
    }

    public function deleteDictionary($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        if (!$dictionary) {
            return response()->json([
                'status' => false,
                'message' => 'Dictionary not found'
            ], 404);
        }

        $dictionary->delete();

        return response()->json([
            'status' => true,
            'message' => 'Dictionary deleted successfully'
        ], 200);
    }
}
