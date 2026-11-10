@php
  // Optional variables: $eyebrow, $title, $subtitle, $showActions.
  $eyebrow     = $eyebrow ?? null;
  $title       = $title ?? 'Conhecimento que transforma comunidades';
  $subtitle    = $subtitle ?? 'Acompanhe nossas publicações, projetos e novidades institucionais em um só lugar.';
  $showActions = $showActions ?? false;
@endphp

<!-- HOME -->
<section id="home" class="bg-brand-50">
  <div class="container-section text-center {{ $showActions ? 'py-20 sm:py-28' : 'py-12 sm:py-16' }}">
    @if ($eyebrow)
      <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-brand-600">{{ $eyebrow }}</p>
    @endif

    <h1 class="mx-auto max-w-3xl text-4xl font-bold tracking-tight text-brand-900 sm:text-5xl">
      {{ $title }}
    </h1>
    <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-600">
      {{ $subtitle }}
    </p>

    @if ($showActions)
      <div class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row">
        <a href="#blog" class="btn-primary">Conheça nosso blog</a>
        <a href="#contato" class="btn-secondary">Fale conosco</a>
      </div>
    @endif
  </div>
</section>
<!-- END HOME -->
