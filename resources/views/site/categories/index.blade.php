@extends('site.layouts.app')

@section('title', 'Categorias')

@section('content')
  @include('site.partials.hero', [
    'eyebrow'  => 'Categorias',
    'title'    => 'Explore por assunto',
    'subtitle' => 'Escolha uma categoria e encontre as publicações sobre o tema.',
  ])

  <section>
    <div class="container-section">
      @forelse ($categories as $category)
        @if ($loop->first)
          <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @endif

        <article class="card flex flex-col p-6">
          <h2 class="text-lg font-semibold text-brand-900">
            <a href="{{ route('categories.show', $category->slug) }}" class="hover:text-brand-600">{{ $category->name }}</a>
          </h2>
          <p class="mt-1 text-xs font-medium text-slate-500">
            {{ $category->posts_count }} {{ $category->posts_count === 1 ? 'post' : 'posts' }}
          </p>

          @if ($category->description)
            <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($category->description, 120) }}</p>
          @endif

          @if ($category->children->isNotEmpty())
            <div class="mt-4 flex flex-wrap gap-2">
              @foreach ($category->children as $child)
                <a href="{{ route('categories.show', $child->slug) }}" class="chip">{{ $child->name }}</a>
              @endforeach
            </div>
          @endif
        </article>

        @if ($loop->last)
          </div>
        @endif
      @empty
        <p class="text-slate-600">Nenhuma categoria encontrada.</p>
      @endforelse
    </div>
  </section>
@endsection
