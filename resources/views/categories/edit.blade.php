<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Modifier la catégorie')

@section('content')
<h1 class="text-2xl font-bold mb-4">Modifier la catégorie</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg" required
            value="{{ old('name', $category->name) }}">
        @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description"
            class="w-full px-4 py-2 border rounded-lg">{{ old('description', $category->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Nouvelle image (facultatif)</label>
        <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg">
        @error('image')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    @if($category->image)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Image actuelle</label>
            <img src="{{ Storage::url($category->image) }}" alt="Current Image" class="w-16 h-16 object-cover">
        </div>
    @endif

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour la catégorie</button>
</form>
@endsection