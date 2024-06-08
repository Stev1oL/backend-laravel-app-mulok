<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterUserController extends Controller
{
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
}
