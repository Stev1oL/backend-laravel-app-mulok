<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    public function createChapter(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_bab' => 'required',
            'judul_bab' => 'required|string',
            'id_semester' => 'required|exists:semesters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $chapter = Chapter::create([
                'nomor_bab' => $request->nomor_bab,
                'judul_bab' => $request->judul_bab,
                'id_semester' => $request->id_semester,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Chapter created successfully',
                'data' => $chapter
            ], 201);
        }
    }

    public function getChapter($id)
    {
        $chapter = Chapter::findOrFail($id);

        if (!$chapter) {
            return response()->json([
                'status' => false,
                'message' => 'Chapter not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $chapter
        ], 200);
    }

    public function getAllChapter(Request $request)
    {
        $perPage = $request->input('page', 10);
        $chapter = Chapter::paginate($perPage);

        if (!$chapter) {
            return response()->json([
                'status' => false,
                'message' => 'Chapter not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All chapters',
            'data' => $chapter
        ], 200);
    }

    public function editChapter($id, Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nomor_bab',
            'judul_bab' => 'string',
            'id_semester' => 'exists:semesters,id',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validatedData->errors()
            ], 400);
        } else {
            $chapter = Chapter::findOrFail($id);
            if (!$chapter) {
                return response()->json([
                    'status' => false,
                    'message' => 'Chapter not found'
                ], 404);
            }

            $chapter->nomor_bab = $request['nomor_bab'];
            $chapter->judul_bab = $request['judul_bab'];
            $chapter->id_semester = $request['id_semester'];

            $chapter->save();

            return response()->json([
                'success' => true,
                'message' => 'Chapter updated successfully',
                'data' => $chapter
            ], 200);
        }
    }

    public function deleteChapter($id)
    {
        $chapter = Chapter::findOrFail($id);
        if (!$chapter) {
            return response()->json([
                'status' => false,
                'message' => 'Chapter not found'
            ], 404);
        }

        $chapter->delete();

        return response()->json([
            'status' => true,
            'message' => 'Chapter deleted successfully'
        ], 200);
    }
}
