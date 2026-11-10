<?php

namespace App\Models;

use App\Helpers\SlugHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'parent_id',
        'is_active',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'views'     => 'integer',
        ];
    }

    /**
     * Boot the model and register its events.
     */
    protected static function booted(): void
    {
        static::saving(function (Category $category): void {
            // Keep the current slug when editing and the name was not changed.
            if ($category->exists && ! $category->isDirty('name') && filled($category->slug)) {
                return;
            }

            $category->slug = SlugHelper::unique($category->name, static::class, $category);
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
