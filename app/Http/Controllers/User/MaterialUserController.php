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
            'chapter',
            'subMaterial.textMaterial',
            'subMaterial.imageMaterial',
        ])->findOrFail($id);

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
        $material = Material::with([
            'chapter',
            'subMaterial.textMaterial',
            'subMaterial.imageMaterial',
        ])->get();

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
}
