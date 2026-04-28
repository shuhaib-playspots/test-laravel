<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(
        private PostService $service
    ) {}

    public function index()
    {
        $posts = $this->service->allForAdmin();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->service->create(
            $request->except('image'),
            $request->file('image')
        );

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post uploaded successfully.');
    }

    public function destroy(int $post)
    {
        $this->service->delete($post);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
