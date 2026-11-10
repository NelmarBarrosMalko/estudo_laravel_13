@extends('site.layouts.app')

@section('content')
  {{-- Hero section (shared with the listing pages) --}}
  @include('site.partials.hero', ['showActions' => true])

  <!-- BLOG -->
  <section id="blog">
    <div class="container-section">
      <div class="flex flex-wrap items-end justify-between gap-4">
        <div>
          <h2 class="text-3xl font-bold tracking-tight text-brand-900">Blog</h2>
          <p class="mt-2 text-slate-600">Últimas publicações do instituto.</p>
        </div>
        <a href="{{ route('posts.index') }}" class="btn-secondary">Ver todos os posts</a>
      </div>

      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
          @include('site.partials.post-card', ['post' => $post])
        @empty
          <p class="text-slate-600">Nenhum post encontrado.</p>
        @endforelse
      </div>
    </div>
  </section>
  <!-- END BLOG -->

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

  <!-- CONTACT -->
  <section id="contato">
    <div class="container-section">
      <div class="mx-auto max-w-xl">
        <h2 class="text-3xl font-bold tracking-tight text-brand-900">Contato</h2>
        <p class="mt-2 text-slate-600">Envie sua mensagem e retornaremos em breve.</p>

        <form action="#" method="post" class="mt-8 space-y-5">
          <div>
            <label for="name" class="form-label">Nome</label>
            <input id="name" name="name" type="text" class="form-input" placeholder="Seu nome" required />
          </div>
          <div>
            <label for="email" class="form-label">E-mail</label>
            <input id="email" name="email" type="email" class="form-input" placeholder="voce@exemplo.com" required />
          </div>
          <div>
            <label for="message" class="form-label">Mensagem</label>
            <textarea id="message" name="message" rows="5" class="form-input" placeholder="Como podemos ajudar?" required></textarea>
          </div>
          <button type="submit" class="btn-primary w-full sm:w-auto">Enviar mensagem</button>
        </form>
      </div>
    </div>
  </section>
  <!-- END CONTACT -->
@endsection