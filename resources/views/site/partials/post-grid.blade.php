{{-- Expects a paginator in $posts. --}}
@if ($posts->isNotEmpty())
  <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($posts as $post)
      @include('site.partials.post-card', ['post' => $post])
    @endforeach
  </div>

  {{ $posts->links('vendor.pagination.site') }}
@else
  <p class="text-slate-600">Nenhum post encontrado.</p>
@endif
