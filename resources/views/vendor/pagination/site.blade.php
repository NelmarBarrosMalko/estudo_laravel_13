@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Paginação" class="mt-12 flex flex-wrap items-center justify-center gap-1.5">
    {{-- Previous --}}
    @if ($paginator->onFirstPage())
      <span class="pagination-item pagination-item-disabled" aria-disabled="true">Anterior</span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-item">Anterior</a>
    @endif

    {{-- Page numbers --}}
    @foreach ($elements as $element)
      @if (is_string($element))
        <span class="pagination-item pagination-item-disabled">{{ $element }}</span>
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <span class="pagination-item pagination-item-active" aria-current="page">{{ $page }}</span>
          @else
            <a href="{{ $url }}" class="pagination-item" aria-label="Ir para a página {{ $page }}">{{ $page }}</a>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-item">Próxima</a>
    @else
      <span class="pagination-item pagination-item-disabled" aria-disabled="true">Próxima</span>
    @endif
  </nav>
@endif
