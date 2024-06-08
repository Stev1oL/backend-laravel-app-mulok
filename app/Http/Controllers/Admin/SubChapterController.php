<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class SubChapterController extends Controller
{
    public function createSubChapter(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_bab' => 'required',
            'judul_sub_bab' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'id_bab' => 'required|exists:chapters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            try {
                $uploadedFileUrl = cloudinary()->upload($request->file('gambar')->getRealPath())->getSecurePath();

                $subChapter = SubChapter::create([
                    'nomor_sub_bab' => $request->nomor_sub_bab,
                    'judul_sub_bab' => $request->judul_sub_bab,
                    'gambar' => $uploadedFileUrl,
                    'id_bab' => $request->id_bab,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Sub Chapter created successfully',
                    'data' => $subChapter
                ], 201);
            } catch (QueryException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function getSubChapter($id)
    {
        $subchapter = SubChapter::findOrFail($id);

        if (!$subchapter) {
            return response()->json([
                'status' => false,
                'message' => 'SubBab not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $subchapter
        ], 200);
    }

    public function getAllSubChapter(Request $request)
    {
        $perPage = $request->input('page', 10);
        $subchapter = SubChapter::paginate($perPage);

        if (!$subchapter) {
            return response()->json([
                'status' => false,
                'message' => 'SubBab not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All SubBab',
            'data' => $subchapter
        ], 200);
    }

    public function editSubChapter($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_sub_bab' => 'required',
            'judul_sub_bab' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg',
            'id_bab' => 'required|exists:chapters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $subchapter = SubChapter::findOrFail($id);
            if (!$subchapter) {
                return response()->json([
                    'status' => false,
                    'message' => 'SubBab not found'
                ], 404);
            }

            $subchapter->nomor_sub_bab = $request['nomor_sub_bab'];
            $subchapter->judul_sub_bab = $request['judul_sub_bab'];
            $subchapter->id_bab = $request['id_bab'];
            if ($request->hasFile('gambar')) {
                $uploadedFileUrl = cloudinary()->upload($request->file('gambar')->getRealPath())->getSecurePath();
                $subchapter->gambar = $uploadedFileUrl;
            }

            $subchapter->save();

            return response()->json([
                'success' => true,
                'message' => 'SubBab updated successfully',
                'data' => $subchapter
            ], 200);
        }
    }

    public function deleteSubChapter($id)
    {
        $subchapter = SubChapter::findOrFail($id);
        if (!$subchapter) {
            return response()->json([
                'status' => false,
                'message' => 'SubBab not found'
            ], 404);
        }

        $subchapter->delete();

        return response()->json([
            'status' => true,
            'message' => 'SubBab deleted successfully'
        ], 200);
    }
}
