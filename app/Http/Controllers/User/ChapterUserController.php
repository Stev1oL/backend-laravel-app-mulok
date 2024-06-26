<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChapterUserController extends Controller
{
    public function getChapter($id)
    {
        try {
            $chapter = Chapter::with([
                'semester',
                'materials',
                'dictionary',
            ])->findOrFail($id);

            return response()->json([
                'status' => true,
                'bab' => $chapter
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Chapter not found'
            ], 404);
        }
    }

    public function getAllChapter()
    {
        $chapters = Chapter::with([
            'semester',
            'materials',
            'dictionary',
        ])->get();

        if ($chapters->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Chapters not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'All chapters',
            'bab' => $chapters
        ], 200);
    }
}
