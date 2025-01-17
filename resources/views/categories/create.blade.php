<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('title', 'Créer une catégorie')

@section('content')
<h1 class="text-2xl font-bold mb-4">Créer une nouvelle catégorie</h1>

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" required
            value="{{ old('name') }}">
        @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description"
            class="w-full px-4 py-2 border rounded-lg">{{ old('description') }}</textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image (facultatif)</label>
        <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg">
        @error('image')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer la catégorie</button>
</form>
@endsection