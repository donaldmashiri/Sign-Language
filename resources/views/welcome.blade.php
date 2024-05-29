<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    {{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
</head>
<body class="font-sans text-gray-900 antialiased">

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('logo/education.jpg')}}" class="h-14" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ZIMBABWE MINISTRY OF EDUCATION SIGN LANGUAGE TO TEXT CONVERSION SYSTEM USING IMAGES</span>
        </a>
    </div>
</nav>

<div class=" flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">

    <iframe width="560" height="315" src="https://www.youtube.com/embed/6_gXiBe9y9A" frameborder="0" allowfullscreen></iframe>

    <div class="max-w-sm mt-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <h4 class="mb-3 font-normal text-gray-700 dark:text-gray-400">User Access.</h4>
        <a href="/login" class="btn btn-primary">
          Login
        </a>
        <a href="/register" class="btn btn-danger">
           Register
        </a>
    </div>
</div>

</body>
</html>
