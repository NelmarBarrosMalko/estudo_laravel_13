@extends('site.layouts.app')

@section('title', 'Blog')

@section('content')
  @include('site.partials.hero', [
    'eyebrow'  => 'Blog',
    'title'    => 'Nossas publicações',
    'subtitle' => 'Artigos, projetos e novidades do instituto.',
  ])

  <section id="blog">
    <div class="container-section">
      @include('site.partials.post-grid', ['posts' => $posts])
    </div>
  </section>
@endsection

