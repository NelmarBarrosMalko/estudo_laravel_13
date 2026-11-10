<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    private const PER_PAGE = 9;

    /**
     * List of active root categories with their active subcategories.
     */
    public function index()
    {
        $activePosts = fn ($query) => $query->where('is_active', true);

        $categories = Category::query()
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->withCount(['posts' => $activePosts])
            ->with(['children' => fn ($query) => $query->where('is_active', true)->orderBy('name')])
            ->orderBy('name')
            ->get();

        return view('site.categories.index', compact('categories'));
    }

    /**
     * Paginated posts of one category (subcategories included).
     */
    public function show(string $slug)
    {
        $category = Category::query()
            ->where('is_active', true)
            ->where('slug', $slug)
            ->with([
                'parent',
                'children' => fn ($query) => $query->where('is_active', true)->orderBy('name'),
            ])
            ->firstOrFail();

        // Count the visit without touching updated_at.
        Category::withoutTimestamps(function () use ($category): void {
            $category->increment('views');
        });

        $categoryIds = $category->children->pluck('id')->push($category->id);

        $posts = Post::query()
            ->with('category')
            ->where('is_active', true)
            ->whereIn('category_id', $categoryIds)
            ->latest()
            ->paginate(self::PER_PAGE);

        return view('site.categories.show', compact('category', 'posts'));
    }
}