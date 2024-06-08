<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialUserController extends Controller
{
    public function getMaterial($id)
    {
        $material = Material::with([
            'subChapter',
            'subMaterial'
        ])->findOrFail($id);

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
        $material = Material::with([
            'subChapter',
            'subMaterial'
        ])->paginate($perPage);

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
}
