<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMaterial;

class SubMaterialUserController extends Controller
{
    public function getSubMaterial($id)
    {
        $submaterial = SubMaterial::findOrFail($id);

        if (!$submaterial) {
            return response()->json([
                'status' => false,
                'message' => 'SubMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $submaterial
        ], 200);
    }

    public function getAllSubMaterial(Request $request)
    {
        $perPage = $request->input('page', 10);
        $submaterial = SubMaterial::paginate($perPage);

        if (!$submaterial) {
            return response()->json([
                'status' => false,
                'message' => 'SubMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All SubMaterials',
            'data' => $submaterial
        ], 200);
    }
}
