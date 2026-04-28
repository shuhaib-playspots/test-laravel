<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(
        private PostService $service
    ) {}

    public function index()
    {
        $posts = $this->service->all();

        return view('posts.index', compact('posts'));
    }
}
