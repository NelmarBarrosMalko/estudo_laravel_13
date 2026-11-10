@extends('site.layouts.app')

@section('content')
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
