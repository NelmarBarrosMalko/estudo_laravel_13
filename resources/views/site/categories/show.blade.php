@extends('site.layouts.app')

@section('title', $category->name)

@section('content')
  @include('site.partials.hero', [
    'eyebrow'  => $category->parent ? $category->parent->name : 'Categoria',
    'title'    => $category->name,
    'subtitle' => $category->description ?: 'Publicações desta categoria.',
  ])

  <section>
    <div class="container-section">
      <div class="mb-8 flex flex-wrap items-center gap-2">
        <a href="{{ route('categories.index') }}" class="chip">&larr; Todas as categorias</a>

        @if ($category->parent)
          <a href="{{ route('categories.show', $category->parent->slug) }}" class="chip">{{ $category->parent->name }}</a>
        @endif

        @foreach ($category->children as $child)
          <a href="{{ route('categories.show', $child->slug) }}" class="chip">{{ $child->name }}</a>
        @endforeach
      </div>

      @include('site.partials.post-grid', ['posts' => $posts])
    </div>
  </section>
@endsection
