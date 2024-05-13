<html lang="fr">
<head>
    <title>Home</title>

    @livewireStyles
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100">

<div class="container h-full">
    @yield('main')
</div>

@livewireScripts

</body>
</html>
