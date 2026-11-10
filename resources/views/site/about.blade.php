@extends('site.layouts.app')

@section('title', 'Sobre o site - ' . config('app.name'))

@section('content')
  <!-- ABOUT -->
  <section id="sobre" class="bg-slate-50">
    <div class="container-section">
      <div class="mx-auto max-w-3xl">
        <h2 class="text-3xl font-bold tracking-tight text-brand-900">Sobre nós</h2>
        <p class="mt-6 text-slate-600">
          O Instituto Exemplo é uma organização dedicada a promover educação, cultura e desenvolvimento social. Atuamos
          desde 2010 com projetos que aproximam pessoas, ideias e oportunidades.
        </p>
        <p class="mt-4 text-slate-600">
          Nossa missão é compartilhar conhecimento de forma acessível e transparente, fortalecendo comunidades por meio
          de ações contínuas, parcerias responsáveis e comunicação aberta.
        </p>
      </div>
    </div>
  </section>
  <!-- END ABOUT -->
@endsection