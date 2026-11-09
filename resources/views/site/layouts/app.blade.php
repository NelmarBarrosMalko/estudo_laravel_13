<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Blog Institucional') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('img/images.png')}}" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZmHsejYH3+Th/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


@include('site.partials.header')

<main>
@yield('content')
</main>

@include('site.partials.footer')
    
    
</body>
</html>