<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return response()->json ([
            'data' => $posts,
            'message' => 'success',
        ], 200);
    }

    public function show($id) {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Failed, no post with ' . $id . ' found',
            ], 404);
        }

        return response()->json ([
            'data' => $post,
            'message' => 'success',
        ], 200);
    }
}
