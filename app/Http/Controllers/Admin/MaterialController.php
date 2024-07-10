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
            'id_bab' => 'required|exists:chapters,id',
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
                'id_bab' => $request->id_bab,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Material created successfully',
                'materi' => $material
            ], 201);
        }
    }

    public function getMaterial($id)
    {
        $material = Material::with(['chapter'])->findOrFail($id);

        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'materi' => $material
        ], 200);
    }

    public function getAllMaterial()
    {
        $material = Material::with(['chapter'])->get();

        if (!$material) {
            return response()->json([
                'status' => false,
                'message' => 'Material not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Materials',
            'materi' => $material
        ], 200);
    }

    public function editMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'judul_materi' => 'string',
            'id_bab' => 'exists:chapters,id',
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
            $material->id_bab = $request['id_bab'];

            $material->save();

            return response()->json([
                'success' => true,
                'message' => 'Material updated successfully',
                'materi' => $material
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
