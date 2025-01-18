<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-lg mb-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="{{ route('home') }}" class="text-xl font-bold">{{ config('app.name') }}</a>
                <div class="space-x-4">
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-gray-900">Articles</a>
                    <a href="{{ route('categories.index') }}" class="text-gray-700 hover:text-gray-900">Catégories</a>

                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Se connecter</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Créer un compte</a>
                    @endguest
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-gray-900">Modifier compte
                            utilisateur</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>

</html>