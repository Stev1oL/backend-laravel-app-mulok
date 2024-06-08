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
            'id_materi' => 'required|exists:materials,id',
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
            ]);

            return response()->json([
                'success' => true,
                'message' => 'SubMaterial created successfully',
                'data' => $submaterial
            ], 201);
        }
    }

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

    public function editSubMaterial($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_materi' => 'required',
            'judul_sub_materi' => 'required|string',
            'id_materi' => 'required|exists:materials,id',
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

            $submaterial->save();

            return response()->json([
                'success' => true,
                'message' => 'SubMaterial updated successfully',
                'data' => $submaterial
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
