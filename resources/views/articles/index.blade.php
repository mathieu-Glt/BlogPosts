@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="grid grid-cols-12 gap-6">

        <!-- Sidebar avec filtres -->
        <div class="col-span-3">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold mb-4">Filtres</h2>

                <!-- Recherche -->
                <form action="{{ route('articles.index') }}" method="GET" class="mb-6">
                    <div class="mb-4">
                        <input type="text" 
                               name="search" 
                               placeholder="Rechercher..." 
                               value="{{ request('search') }}"
                               class="w-full px-3 py-2 border rounded">
                    </div>

                    <!-- Catégories -->
                    <div class="mb-4">
                        <h3 class="font-medium mb-2">Catégories</h3>
                        @foreach($categories as $category)
                            <div class="mb-2">
                                <label class="flex items-center">
                                    <input type="radio" 
                                           name="category" 
                                           value="{{ $category->id }}"
                                           {{ request('category') == $category->id ? 'checked' : '' }}
                                           class="mr-2">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" 
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Filtrer
                    </button>
                </form>
            </div>
        </div>

        <!-- Liste des articles -->
        <div class="col-span-9">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Articles</h1>
                <a href="{{ route('articles.create') }}" 
                   class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Nouvel Article
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6">
                @forelse($articles as $article)
                    <article class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="md:flex">
                            <div class="md:flex-shrink-0">
                                @if($article->image)
                                    <img class="h-48 w-full object-cover md:w-48" 
                                         src="{{ asset('storage/' . $article->image) }}" 
                                         alt="{{ $article->title }}">
                                @else
                                    <img class="h-48 w-full object-cover md:w-48" 
                                         src="{{ asset('storage/images/default-image.jpg') }}" 
                                         alt="Image par défaut">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                    <span>{{ $article->author }}</span>
                                    <span>{{ $article->created_at->format('d/m/Y') }}</span>
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                        {{ $article->category->name }}
                                    </span>
                                </div>

                                <h2 class="text-xl font-semibold mb-2">
                                    <a href="{{ route('articles.show', $article) }}" 
                                       class="hover:text-blue-600">
                                        {{ $article->title }}
                                    </a>
                                </h2>

                                <p class="text-gray-600 mb-4">
                                    {{ $article->excerpt ?? Str::limit($article->content, 150) }}
                                </p>

                                <div class="flex gap-2">
                                    <a href="{{ route('articles.show', $article) }}" 
                                       class="text-blue-500 hover:text-blue-700">
                                        Lire la suite
                                    </a>
                                    <a href="{{ route('articles.edit', $article) }}" 
                                       class="text-gray-500 hover:text-gray-700">
                                        Modifier
                                    </a>
                                    <form action="{{ route('articles.destroy', $article) }}" 
                                          method="POST" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <p class="text-gray-600">Aucun article trouvé.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
