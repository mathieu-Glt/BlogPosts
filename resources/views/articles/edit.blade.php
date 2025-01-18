@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Modifier l'article</h1>
        <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Auteur</label>
                <input type="text" id="author" name="author" class="w-full px-4 py-2 border rounded-lg"
                    value="{{ old('author', $article->author) }}" required>
                @error('author')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-lg" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea id="content" name="content" class="w-full px-4 py-2 border rounded-lg" rows="6"
                    required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="excerpt" class="block text-sm font-medium text-gray-700">Extrait</label>
                <textarea id="excerpt" name="excerpt" class="w-full px-4 py-2 border rounded-lg"
                    rows="3">{{ old('excerpt', $article->excerpt) }}</textarea>
                @error('excerpt')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg">
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                        class="w-full h-auto rounded-lg mt-2">
                @endif
                @error('image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour l'article</button>
        </form>
    </div>
</div>
@endsection