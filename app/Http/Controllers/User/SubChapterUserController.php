<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubChapter;

class SubChapterUserController extends Controller
{
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
}
