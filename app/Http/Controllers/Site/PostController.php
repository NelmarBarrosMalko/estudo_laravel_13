<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    private const PER_PAGE = 9;

    /**
     * Paginated list of active posts.
     */
    public function index()
    {
        $posts = Post::query()
            ->with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate(self::PER_PAGE);

        return view('site.posts.index', compact('posts'));
    }

    /**
     * Single post page, found by slug.
     */
    public function show(string $slug)
    {
        $post = Post::query()
            ->with(['category', 'user'])
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();

        // Count the visit without touching updated_at.
        Post::withoutTimestamps(function () use ($post): void {
            $post->increment('views', 1, ['last_visited_at' => now()]);
        });

        // More posts from the same category.
        $relatedPosts = Post::query()
            ->with('category')
            ->where('is_active', true)
            ->where('category_id', $post->category_id)
            ->whereKeyNot($post->getKey())
            ->latest()
            ->take(3)
            ->get();

        return view('site.posts.show', compact('post', 'relatedPosts'));
    }
}