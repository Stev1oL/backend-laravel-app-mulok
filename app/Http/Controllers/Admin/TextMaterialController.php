<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TextMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class TextMaterialController extends Controller
{
    public function createTextMaterial(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'materi' => 'required|string',
            'terjemahan' => 'required|string',
            'audio' => 'file|mimes:mp3,wav,ogg,aac,flac',
            'id_sub_materi' => 'required|exists:sub_materials,id',
            'id_kategori' => 'required|exists:category_materials,id',
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

                $text = TextMaterial::create([
                    'materi' => $request->materi,
                    'terjemahan' => $request->terjemahan,
                    'audio' => $uploadedFileUrl,
                    'id_sub_materi' => $request->id_sub_materi,
                    'id_kategori' => $request->id_kategori,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Text Material created successfully',
                    'data' => $text
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function getTextMaterial($id)
    {
        $text = TextMaterial::findOrFail($id);

        if (!$text) {
            return response()->json([
                'status' => false,
                'message' => 'Text Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $text
        ], 200);
    }

    public function getAllTextMaterial(Request $request)
    {
        $perPage = $request->input('page', 10);
        $text = TextMaterial::paginate($perPage);

        if (!$text) {
            return response()->json([
                'status' => false,
                'message' => 'Text Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Text Materials',
            'data' => $text
        ], 200);
    }

    public function editTextMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'materi' => 'string',
            'terjemahan' => 'string',
            'audio' => 'file|mimes:mp3,wav,ogg,aac,flac',
            'id_sub_materi' => 'exists:sub_materials,id',
            'id_kategori' => 'exists:category_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $text = TextMaterial::findOrFail($id);
            if (!$text) {
                return response()->json([
                    'status' => false,
                    'message' => 'Text Material not found'
                ], 404);
            }

            $text->materi = $request['materi'];
            $text->terjemahan = $request['terjemahan'];
            $text->id_sub_materi = $request['id_sub_materi'];
            $text->id_kategori = $request['id_kategori'];
            if ($request->hasFile('audio')) {
                $uploadedFileUrl = cloudinary()->uploadFile($request->file('audio')->getRealPath())->getSecurePath();
                $text->audio = $uploadedFileUrl;
            }

            $text->save();

            return response()->json([
                'success' => true,
                'message' => 'Text Material updated successfully',
                'data' => $text
            ], 200);
        }
    }

    public function deleteTextMaterial($id)
    {
        $text = TextMaterial::findOrFail($id);
        if (!$text) {
            return response()->json([
                'status' => false,
                'message' => 'Text Material not found'
            ], 404);
        }

        $text->delete();

        return response()->json([
            'status' => true,
            'message' => 'Text Material deleted successfully'
        ], 200);
    }
}
