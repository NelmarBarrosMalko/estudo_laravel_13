@php
  // Menu items: label (shown to users), target url and active state.
  $menuLinks = [
    ['label' => 'Home',       'href' => route('home'),                'active' => request()->routeIs('home')],
    ['label' => 'Blog',       'href' => route('posts.index'),         'active' => request()->routeIs('posts.*')],
    ['label' => 'Categorias', 'href' => route('categories.index'),    'active' => request()->routeIs('categories.*')],
    ['label' => 'Sobre',      'href' => route('home') . '#sobre',     'active' => false],
    ['label' => 'Contato',    'href' => route('home') . '#contato',   'active' => false],
  ];
@endphp

<!-- NAVBAR -->
<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
  <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Principal">
    <a href="{{ route('home') }}" class="text-lg font-bold text-brand-900">Instituto Exemplo</a>

    <!-- Desktop links -->
    <ul class="hidden items-center gap-8 md:flex">
      @foreach ($menuLinks as $link)
        <li>
          <a href="{{ $link['href'] }}"
             class="nav-link {{ $link['active'] ? 'nav-link-active' : '' }}"
             @if ($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
        </li>
      @endforeach
    </ul>

    <!-- Mobile toggle -->
    <button
      id="menu-toggle"
      type="button"
      class="inline-flex items-center justify-center rounded-lg p-2 text-slate-700 hover:bg-slate-100 md:hidden"
      aria-controls="mobile-menu"
      aria-expanded="false"
      aria-label="Abrir menu"
    >
      <svg id="icon-open" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg id="icon-close" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18" />
      </svg>
    </button>
  </nav>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="hidden border-t border-slate-200 bg-white md:hidden">
    <ul class="mx-auto max-w-6xl space-y-1 px-4 py-3 sm:px-6">
      @foreach ($menuLinks as $link)
        <li>
          <a href="{{ $link['href'] }}"
             class="nav-link {{ $link['active'] ? 'nav-link-active' : '' }} block py-2"
             @if ($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</header>
<!-- END NAVBAR -->