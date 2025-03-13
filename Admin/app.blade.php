<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 flex justify-between items-center">
        <div class="text-white font-bold text-lg">Admin Panel</div>
        <div class="space-x-4 flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-white hover:underline">Dashboard</a>
            <a href="{{ route('admin.projets.index') }}" class="text-white hover:underline">Projets</a>

            <!-- Bouton de Déconnexion -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white bg-red-500 px-3 py-2 rounded hover:bg-red-600">Déconnexion</button>
            </form>

            <!-- Affichage du nom de l'utilisateur -->
            <a href="{{ route('profile.edit') }}" class="text-white ml-4 no-underline hover:underline">
                {{ Auth::user()->name }}
            </a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

</body>
</html>
