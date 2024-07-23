<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMaterial;
use Illuminate\Support\Facades\Validator;

class SubMaterialController extends Controller
{
    public function createSubMaterial(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_materi' => 'required',
            'judul_sub_materi' => 'required|string',
            'terjemahan_judul' => 'required|string',
            'id_materi' => 'required|exists:materials,id',
            'id_kategori' => 'required|exists:category_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $submaterial = SubMaterial::create([
                'nomor_sub_materi' => $request->nomor_sub_materi,
                'judul_sub_materi' => $request->judul_sub_materi,
                'id_materi' => $request->id_materi,
                'id_kategori' => $request->id_kategori,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'SubMaterial created successfully',
                'sub_materi' => $submaterial
            ], 201);
        }
    }

    public function getSubMaterial($id)
    {
        $submaterial = SubMaterial::with([
            'material',
            'category'
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
            'category'
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

    public function editSubMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_materi' => 'required',
            'judul_sub_materi' => 'required|string',
            'terjemahan_judul' => 'required|string',
            'id_materi' => 'required|exists:materials,id',
            'id_kategori' => 'required|exists:category_materials,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $submaterial = SubMaterial::findOrFail($id);
            if (!$submaterial) {
                return response()->json([
                    'status' => false,
                    'message' => 'SubMaterial not found'
                ], 404);
            }

            $submaterial->nomor_sub_materi = $request['nomor_sub_materi'];
            $submaterial->judul_sub_materi = $request['judul_sub_materi'];
            $submaterial->id_materi = $request['id_materi'];
            $submaterial->id_kategori = $request['id_kategori'];

            $submaterial->save();

            return response()->json([
                'success' => true,
                'message' => 'SubMaterial updated successfully',
                'sub_materi' => $submaterial
            ], 200);
        }
    }

    public function deleteSubMaterial($id)
    {
        $submaterial = SubMaterial::findOrFail($id);
        if (!$submaterial) {
            return response()->json([
                'status' => false,
                'message' => 'SubMaterial not found'
            ], 404);
        }

        $submaterial->delete();

        return response()->json([
            'status' => true,
            'message' => 'SubMaterial deleted successfully'
        ], 200);
    }
}
