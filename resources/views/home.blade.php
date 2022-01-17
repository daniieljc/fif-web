<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Search tool for CFX."/>
    <meta name="keywords"
          content="fivem, cfx, ip finder, server fivem"/>

    <title>{{ config('app.name', 'FFinder') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118150984-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118150984-11');
    </script>
</head>
<body>
<div class="bg-gray-900 min-h-screen">
    <main>
        <section class="mx-auto max-w-7xl px-8">
            <livewire:search/>
        </section>
    </main>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
@livewireScripts

</body>
</html>
