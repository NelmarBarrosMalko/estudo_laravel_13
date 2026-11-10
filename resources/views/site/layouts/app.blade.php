<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@hasSection('title')@yield('title') | @endif{{ config('app.name', 'Blog Institucional') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('site.partials.header')

<main class="pt-16">
@yield('content')
</main>

@include('site.partials.footer')

</body>
</html>