@extends('layouts.app')

@section('title', $articles->first()->title ?? 'Liste des articles')

@section('content')
<div class="grid grid-cols-12 gap-6">

    <div class="col-span-3">
    </div>

    <!-- Article et commentaires -->
    <div class="col-span-9">
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    @if($article->image)
                        <img class="h-48 w-full object-cover md:w-48" src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}">
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

                    <h2 class="text-2xl font-semibold mb-4">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-6">{{ $article->content }}</p>

                    <h3 class="text-xl font-semibold mb-4">Commentaires</h3>

                    @foreach ($article->comments as $comment)
                        <div class="border-t pt-4 mb-4">
                            <div class="flex items-center gap-4 mb-2">
                                <strong class="text-lg">{{ $comment->user->name ?? $comment->user_name }}</strong>
                                <span class="text-sm text-gray-500">{{ $comment->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="text-gray-600">{{ $comment->content }}</p>

                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Supprimer
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endforeach

                    <!-- Ajouter un commentaire -->
                    @auth
                        <h4 class="text-lg font-semibold mt-6">Ajouter un commentaire</h4>
                        <form action="{{ route('comments.store', $article->slug) }}" method="POST" class="mt-4">
                            @csrf
                            <textarea name="content" required placeholder="Votre commentaire..."
                                class="w-full px-4 py-2 border rounded-lg mb-4"></textarea>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Ajouter un commentaire
                            </button>
                        </form>
                    @else
                        <p class="text-gray-600 mt-4">Vous devez être connecté pour ajouter un commentaire.</p>
                    @endauth
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('articles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Retour à la liste des articles
            </a>
        </div>
    </div>
</div>
@endsection