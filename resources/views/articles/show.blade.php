@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-700 mb-4">Par {{ $article->author }} | {{ $article->created_at->format('d M Y') }}</p>
        <div class="mb-4">
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                    class="w-full h-auto rounded-lg">
            @endif
        </div>
        <div class="text-gray-800 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>
        <p class="text-gray-500 mt-4">Slug: {{ $article->slug }}</p>
    </div>
    <div class="mt-4">
        <a href="{{ route('articles.edit', $article->id) }}"
            class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
        </form>
    </div>
</div>
@endsection