<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageMaterial;
use Illuminate\Support\Facades\Validator;

class ImageMaterialController extends Controller
{
    public function createImageMaterial(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'materi' => 'required|string',
            'id_sub_materi' => 'required|exists:sub_materials,id',
            'id_kategori' => 'required|exists:category_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $image = ImageMaterial::create([
                'materi' => $request->materi,
                'id_sub_materi' => $request->id_sub_materi,
                'id_kategori' => $request->id_kategori,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'ImageMaterial created successfully',
                'gambar' => $image
            ], 201);
        }
    }

    public function getImageMaterial($id)
    {
        $image = ImageMaterial::with(['category', 'subMaterial'])->findOrFail($id);
        if (!$image) {
            return response()->json([
                'status' => false,
                'message' => 'ImageMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'gambar' => $image
        ], 200);
    }

    public function getAllImageMaterial()
    {
        $image = ImageMaterial::with(['category', 'subMaterial'])->all();
        if (!$image) {
            return response()->json([
                'status' => false,
                'message' => 'ImageMaterial not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All ImageMaterials',
            'gambar' => $image
        ], 200);
    }

    public function editImageMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'materi' => 'required|string',
            'id_sub_materi' => 'required|exists:sub_materials,id',
            'id_kategori' => 'required|exists:category_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validate error',
                'errors' => $validatedData->errors()
            ], 500);
        } else {
            $image = ImageMaterial::findOrFail($id);
            if (!$image) {
                return response()->json([
                    'status' => false,
                    'message' => 'ImageMaterial not found'
                ], 404);
            }

            $image->materi = $request['materi'];
            $image->id_sub_materi = $request['id_sub_materi'];
            $image->id_kategori = $request['id_kategori'];

            $image->save();

            return response()->json([
                'success' => true,
                'message' => 'ImageMaterial updated successfully',
                'gambar' => $image
            ], 200);
        }
    }

    public function deleteImageMaterial($id)
    {
        $image = ImageMaterial::findOrFail($id);

        if (!$image) {
            return response()->json([
                'status' => false,
                'message' => 'ImageMaterial not found'
            ], 404);
        }

        $image->delete();

        return response()->json([
            'status' => true,
            'message' => 'ImageMaterial deleted successfully'
        ], 200);
    }
}
