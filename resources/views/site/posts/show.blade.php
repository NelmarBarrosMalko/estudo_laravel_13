@extends('site.layouts.app')

@section('title', $post->title)

@php
  $cover = $post->cover
      ? \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover)
      : null;
@endphp

@section('content')
  <article>
    <div class="container-section">
      <div class="mx-auto max-w-3xl">
        <!-- Breadcrumb -->
        <nav aria-label="Você está em" class="text-sm text-slate-500">
          <a href="{{ route('posts.index') }}" class="hover:text-brand-600">Blog</a>
          @if ($post->category)
            <span aria-hidden="true" class="mx-1">/</span>
            <a href="{{ route('categories.show', $post->category->slug) }}" class="hover:text-brand-600">{{ $post->category->name }}</a>
          @endif
        </nav>

        <h1 class="mt-4 text-3xl font-bold tracking-tight text-brand-900 sm:text-4xl">{{ $post->title }}</h1>

        <p class="mt-4 text-sm font-medium text-slate-500">
          @if ($post->author)
            Por {{ $post->author }} &bull;
          @endif
          <time datetime="{{ $post->created_at->toDateString() }}">{{ $post->created_at->format('d/m/Y') }}</time>
        </p>

        @if ($cover)
          <img src="{{ $cover }}" alt="{{ $post->title }}" class="mt-8 aspect-video w-full rounded-xl border border-slate-200 object-cover" />
        @endif

        {{-- Content comes from the admin rich editor (trusted HTML). --}}
        <div class="post-content mt-8">
          {!! $post->content !!}
        </div>

        <div class="mt-12 border-t border-slate-200 pt-6">
          <a href="{{ route('posts.index') }}" class="btn-secondary">&larr; Voltar para o blog</a>
        </div>
      </div>
    </div>
  </article>

  @if ($relatedPosts->isNotEmpty())
    <section class="bg-slate-50">
      <div class="container-section">
        <h2 class="text-2xl font-bold tracking-tight text-brand-900">Leia também</h2>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($relatedPosts as $relatedPost)
            @include('site.partials.post-card', ['post' => $relatedPost])
          @endforeach
        </div>
      </div>
    </section>
  @endif
@endsection
