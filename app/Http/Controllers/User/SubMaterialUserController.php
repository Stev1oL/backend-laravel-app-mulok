<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMaterial;

class SubMaterialUserController extends Controller
{
    public function getSubMaterial($id)
    {
        $submaterial = SubMaterial::with([
            'material',
            'category',
            'textMaterial',
            'imageMaterial'
        ])->findOrFail($id);

        if (!$submaterial) {
            return response()->json([
                'status' => false,
                'message' => 'SubMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'sub_materi' => $submaterial
        ], 200);
    }

    public function getAllSubMaterial()
    {
        $submaterial = SubMaterial::with([
            'material',
            'category',
            'textMaterial',
            'imageMaterial'
        ])->get();

        if (!$submaterial) {
            return response()->json([
                'status' => false,
                'message' => 'SubMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All SubMaterials',
            'sub_materi' => $submaterial
        ], 200);
    }
}
