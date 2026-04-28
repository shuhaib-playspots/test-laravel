<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function allForFeed(): Collection
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function allForAdmin(): Collection
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    public function findById(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function delete(Post $post): void
    {
        $post->delete();
    }
}
