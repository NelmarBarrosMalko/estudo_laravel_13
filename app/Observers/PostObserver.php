<?php

namespace App\Observers;

use App\Filament\Resources\Posts\Schemas\PostForm;
use App\Helpers\SlugHelper;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post): void
    {
        // Slug is generated from the title and kept when the title is unchanged.
        $post->slug = SlugHelper::unique(
            title: (string) $post->title,
            modelClass: Post::class,
            record: $post,
            titleColumn: 'title',
        );
    }

    public function creating(Post $post): void
    {
        // Store the logged-in user as the post owner.
        $post->user_id ??= Auth::id();
    }

    public function updated(Post $post): void
    {
        // Remove the previous cover when it was replaced or cleared.
        if ($post->wasChanged('cover')) {
            $this->deleteFile($post->getOriginal('cover'));
        }

        // Remove images that no longer appear in the content.
        if ($post->wasChanged('content')) {
            $removed = array_diff(
                $this->extractAttachments((string) $post->getOriginal('content')),
                $this->extractAttachments((string) $post->content),
            );

            foreach ($removed as $path) {
                $this->deleteFile($path);
            }
        }
    }

    public function deleted(Post $post): void
    {
        $this->deleteFile($post->cover);

        foreach ($this->extractAttachments((string) $post->content) as $path) {
            $this->deleteFile($path);
        }
    }

    /**
     * Collect the storage paths of images embedded in the HTML content.
     *
     * @return array<int, string>
     */
    private function extractAttachments(string $html): array
    {
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $matches);

        $paths = [];

        foreach ($matches[1] as $src) {
            $path = Str::after(urldecode((string) parse_url($src, PHP_URL_PATH)), '/storage/');

            // Only touch files inside the attachments directory.
            if (str_starts_with($path, PostForm::ATTACHMENTS_DIRECTORY . '/')) {
                $paths[] = $path;
            }
        }

        return array_values(array_unique($paths));
    }

    private function deleteFile(?string $path): void
    {
        if (filled($path)) {
            Storage::disk(PostForm::DISK)->delete($path);
        }
    }
}
