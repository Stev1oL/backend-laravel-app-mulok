<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryMaterialController extends Controller
{
    public function createCategory(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama_kategori' => 'required|string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $category = CategoryMaterial::create([
                'nama_kategori' => $request->nama_kategori
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $category
            ], 201);
        }
    }

    public function getCategory($id)
    {
        $category = CategoryMaterial::findOrFail($id);
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $category
        ], 200);
    }

    public function getAllCategory()
    {
        $category = CategoryMaterial::all();
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All Categories',
            'data' => $category
        ], 200);
    }

    public function editCategory($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nama_kategori' => 'string'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $category = CategoryMaterial::findOrFail($id);
            if (!$category) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            $category->nama_kategori = $request['nama_kategori'];

            $category->save();

            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully',
                'data' => $category
            ], 200);
        }
    }

    public function deleteCategory($id)
    {
        $category = CategoryMaterial::findOrFail($id);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
