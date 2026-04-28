<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function __construct(
        private PostRepository $repository
    ) {}

    public function all(): Collection
    {
        return $this->repository->allForFeed();
    }

    public function allForAdmin(): Collection
    {
        return $this->repository->allForAdmin();
    }

    public function create(array $data, UploadedFile $image): Post
    {
        $data['image_path'] = $image->store('posts', 'public');

        return $this->repository->create($data);
    }

    public function delete(int $id): void
    {
        $post = $this->repository->findById($id);

        Storage::disk('public')->delete($post->image_path);

        $this->repository->delete($post);
    }
}
