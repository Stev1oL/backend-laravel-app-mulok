<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroupTextMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class GroupTextController extends Controller
{
    public function createGroupText(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_bab' => 'required',
            'judul_sub_bab' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'id_sub_materi' => 'required|exists:sub_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            try {
                $uploadedFileUrl = cloudinary()->upload($request->file('gambar')->getRealPath())->getSecurePath();

                $grouptext = GroupTextMaterial::create([
                    'nomor_sub_bab' => $request->nomor_sub_bab,
                    'judul_sub_bab' => $request->judul_sub_bab,
                    'gambar' => $uploadedFileUrl,
                    'id_sub_materi' => $request->id_sub_materi,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Group Text created successfully',
                    'data' => $grouptext
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function getGroupText($id)
    {
        $grouptext = GroupTextMaterial::findOrFail($id);

        if (!$grouptext) {
            return response()->json([
                'status' => false,
                'message' => 'Group Text not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $grouptext
        ], 200);
    }

    public function getAllGroupText(Request $request)
    {
        $perPage = $request->input('page', 10);
        $grouptext = GroupTextMaterial::paginate($perPage);

        if (!$grouptext) {
            return response()->json([
                'status' => false,
                'message' => 'SubBab not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Group Text',
            'data' => $grouptext
        ], 200);
    }

    public function editGroupText($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_bab' => 'required',
            'judul_sub_bab' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'id_sub_materi' => 'required|exists:sub_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $grouptext = GroupTextMaterial::findOrFail($id);
            if (!$grouptext) {
                return response()->json([
                    'status' => false,
                    'message' => 'Group Text not found'
                ], 404);
            }

            $grouptext->nomor_sub_bab = $request['nomor_sub_bab'];
            $grouptext->judul_sub_bab = $request['judul_sub_bab'];
            $grouptext->id_sub_materi = $request['id_sub_materi'];
            if ($request->hasFile('gambar')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('gambar')->getRealPath())->getSecurePath();
                $grouptext->gambar = $uploadedFileUrl;
            }

            $grouptext->save();

            return response()->json([
                'success' => true,
                'message' => 'Group Text updated successfully',
                'data' => $grouptext
            ], 200);
        }
    }

    public function deleteGroupText($id)
    {
        $grouptext = GroupTextMaterial::findOrFail($id);
        if (!$grouptext) {
            return response()->json([
                'status' => false,
                'message' => 'Group Text not found'
            ], 404);
        }

        $grouptext->delete();

        return response()->json([
            'status' => true,
            'message' => 'Group Text deleted successfully'
        ], 200);
    }
}
