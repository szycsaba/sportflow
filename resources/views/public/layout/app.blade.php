<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="flex flex-col min-h-screen">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col flex-1">
    <x-topmenu />
    <main class="flex-1 bg-slate-50">
        <section class="event max-w-7xl mx-auto sm:px-6 lg:px-8 px-6">
            @yield('content')
        </section>
    </main>
    <footer class="text-white sm:py-1 lg:py-2 text-center bg-teal-500">
        © {{ date('Y') }} Szy Csaba. Minden jog fenntartva.
    </footer>
    @vite(['resources/js/app.js'])
</body>

</html>
