<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        if (Category::count() === 0) {
            $this->command->error('Nenhuma categoria encontrada. Rode o seeder de categorias antes.');
            return;
        }

        $users = User::pluck('id');
        $categories = Category::pluck('id');

        Post::factory(30)
            ->make()
            ->each(function (Post $post) use ($users, $categories) {
                $post->user_id = $users->random();
                $post->category_id = $categories->random();

                // Unique slug (title, title-1, title-2...)
                $base = Str::slug($post->title);
                $slug = $base;
                $i = 1;
                while (Post::where('slug', $slug)->exists()) {
                    $slug = "{$base}-{$i}";
                    $i++;
                }
                $post->slug = $slug;

                $post->save();
            });
    }
}
