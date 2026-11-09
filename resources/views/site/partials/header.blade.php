<!-- NAVBAR -->
<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
  <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Principal">
    <a href="#home" class="text-lg font-bold text-brand-900">Instituto Exemplo</a>

    <!-- Desktop links -->
    <ul class="hidden items-center gap-8 md:flex">
      <li><a href="#home" class="nav-link">Home</a></li>
      <li><a href="#blog" class="nav-link">Blog</a></li>
      <li><a href="#sobre" class="nav-link">Sobre</a></li>
      <li><a href="#contato" class="nav-link">Contato</a></li>
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
      <li><a href="#home" class="nav-link block py-2">Home</a></li>
      <li><a href="#blog" class="nav-link block py-2">Blog</a></li>
      <li><a href="#sobre" class="nav-link block py-2">Sobre</a></li>
      <li><a href="#contato" class="nav-link block py-2">Contato</a></li>
    </ul>
  </div>
</header>
<!-- END NAVBAR -->

<main class="pt-16">

  <!-- HOME -->
  <section id="home" class="bg-brand-50">
    <div class="container-section py-20 text-center sm:py-28">
      <h1 class="mx-auto max-w-3xl text-4xl font-bold tracking-tight text-brand-900 sm:text-5xl">
        Conhecimento que transforma comunidades
      </h1>
      <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-600">
        Acompanhe nossas publicações, projetos e novidades institucionais em um só lugar.
      </p>
      <div class="mt-10 flex flex-col items-center justify-center gap-3 sm:flex-row">
        <a href="#blog" class="btn-primary">Conheça nosso blog</a>
        <a href="#contato" class="btn-secondary">Fale conosco</a>
      </div>
    </div>
  </section>
  <!-- END HOME -->

  <!-- BLOG -->
  <section id="blog">
    <div class="container-section">
      <h2 class="text-3xl font-bold tracking-tight text-brand-900">Blog</h2>
      <p class="mt-2 text-slate-600">Últimas publicações do instituto.</p>

      <!-- Post list: add more <article> items here -->
      <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

        <article class="card flex flex-col">
          <img src="https://picsum.photos/seed/post-1/640/360" alt="Pessoas reunidas em um workshop" class="aspect-video w-full object-cover" loading="lazy" />
          <div class="flex flex-1 flex-col p-5">
            <time datetime="2026-10-28" class="text-xs font-medium text-slate-500">28 de outubro de 2026</time>
            <h3 class="mt-2 text-lg font-semibold text-brand-900">
              <a href="#" class="hover:text-brand-600">Resultados do nosso programa de capacitação</a>
            </h3>
            <p class="mt-2 text-sm text-slate-600">
              Veja os principais números e aprendizados da última edição do programa, que reuniu mais de 300 participantes.
            </p>
          </div>
        </article>

        <article class="card flex flex-col">
          <img src="https://picsum.photos/seed/post-2/640/360" alt="Equipe discutindo um projeto" class="aspect-video w-full object-cover" loading="lazy" />
          <div class="flex flex-1 flex-col p-5">
            <time datetime="2026-10-15" class="text-xs font-medium text-slate-500">15 de outubro de 2026</time>
            <h3 class="mt-2 text-lg font-semibold text-brand-900">
              <a href="#" class="hover:text-brand-600">Novas parcerias para o próximo ano</a>
            </h3>
            <p class="mt-2 text-sm text-slate-600">
              Anunciamos três novas parcerias que ampliam o alcance das nossas ações em diferentes regiões.
            </p>
          </div>
        </article>

        <article class="card flex flex-col">
          <img src="https://picsum.photos/seed/post-3/640/360" alt="Auditório durante um evento" class="aspect-video w-full object-cover" loading="lazy" />
          <div class="flex flex-1 flex-col p-5">
            <time datetime="2026-09-30" class="text-xs font-medium text-slate-500">30 de setembro de 2026</time>
            <h3 class="mt-2 text-lg font-semibold text-brand-900">
              <a href="#" class="hover:text-brand-600">Retrospectiva do nosso encontro anual</a>
            </h3>
            <p class="mt-2 text-sm text-slate-600">
              Um resumo das palestras, debates e momentos que marcaram o evento deste ano.
            </p>
          </div>
        </article>

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

</main>

<!-- FOOTER -->
<footer class="bg-slate-900 text-slate-300">
  <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 py-8 sm:px-6 md:flex-row lg:px-8">
    <p class="text-sm">&copy; 2026 Instituto Exemplo. Todos os direitos reservados.</p>
    <ul class="flex items-center gap-6 text-sm">
      <li><a href="#" class="transition-colors hover:text-white">Instagram</a></li>
      <li><a href="#" class="transition-colors hover:text-white">LinkedIn</a></li>
      <li><a href="#" class="transition-colors hover:text-white">YouTube</a></li>
    </ul>
  </div>
</footer>
<!-- END FOOTER -->