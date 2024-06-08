<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function createMaterial(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'judul_materi' => 'required|string',
            'id_sub_bab' => 'required|exists:sub_chapters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $material = Material::create([
                'judul_materi' => $request->judul_materi,
                'id_sub_bab' => $request->id_sub_bab,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Material created successfully',
                'data' => $material
            ], 201);
        }
    }

    public function getMaterial($id)
    {
        $material = Material::findOrFail($id);

        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $material
        ], 200);
    }

    public function getAllMaterial(Request $request)
    {
        $perPage = $request->input('page', 10);
        $material = Material::paginate($perPage);

        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Materials',
            'data' => $material
        ], 200);
    }

    public function editMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'judul_materi' => 'required|string',
            'id_sub_bab' => 'required|exists:sub_chapters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $material = Material::findOrFail($id);
            if (!$material) {
                return response()->json([
                    'status' => false,
                    'message' => 'Material not found'
                ], 404);
            }

            $material->judul_materi = $request['judul_materi'];
            $material->id_sub_bab = $request['id_sub_bab'];

            $material->save();

            return response()->json([
                'success' => true,
                'message' => 'Material updated successfully',
                'data' => $material
            ], 200);
        }
    }

    public function deleteMaterial($id)
    {
        $material = Material::findOrFail($id);
        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        $material->delete();

        return response()->json([
            'status' => true,
            'message' => 'Material deleted successfully'
        ], 200);
    }
}
