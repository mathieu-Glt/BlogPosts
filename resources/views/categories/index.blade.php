<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter une
        catégorie</a>
</div>

<table class="min-w-full table-auto border-collapse">
    <thead>
        <tr>
            <th class="border px-4 py-2">Nom</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td class="border px-4 py-2">{{ $category->description }}</td>
                <td class="border px-4 py-2">
                    @if($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                            class="w-16 h-16 object-cover">
                    @else
                        <span>Aucune image</span>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="text-blue-500 hover:text-blue-700">Modifier</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection