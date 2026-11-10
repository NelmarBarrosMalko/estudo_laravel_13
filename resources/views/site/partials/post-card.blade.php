@php
  // Uploaded cover or a placeholder when the post has none.
  $cover = $post->cover
      ? \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover)
      : 'https://picsum.photos/seed/post-' . $post->id . '/640/360';
@endphp

<article class="card flex flex-col">
  <a href="{{ route('posts.show', $post->slug) }}" tabindex="-1" aria-hidden="true">
    <img src="{{ $cover }}" alt="" class="aspect-video w-full object-cover" loading="lazy" />
  </a>
  <div class="flex flex-1 flex-col p-5">
    <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
      @if ($post->category)
        <a href="{{ route('categories.show', $post->category->slug) }}" class="font-semibold text-brand-600 hover:text-brand-700">
          {{ $post->category->name }}
        </a>
        <span aria-hidden="true">&bull;</span>
      @endif
      <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('d/m/Y') }}</time>
    </div>
    <h3 class="mt-2 text-lg font-semibold text-brand-900">
      <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-brand-600">{{ $post->title }}</a>
    </h3>
    <p class="mt-2 text-sm text-slate-600">
      {{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($post->content)), 100) }}
    </p>
  </div>
</article>
