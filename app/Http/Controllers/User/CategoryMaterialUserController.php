<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryMaterial;

class CategoryMaterialUserController extends Controller
{
    public function getCategory($id)
    {
        $category = CategoryMaterial::with([
            'subMaterial',
            'imageMaterial',
            'textMaterial'
        ])->findOrFail($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'kategori' => $category
        ], 200);
    }

    public function getAllCategory()
    {
        $category = CategoryMaterial::with([
            'subMaterial',
            'imageMaterial',
            'textMaterial'
        ])->get();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Categories',
            'kategori' => $category
        ], 200);
    }
}
