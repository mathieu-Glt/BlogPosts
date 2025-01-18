@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Créer un article') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Titre de l'article -->
                        <div class="form-group mb-4">
                            <label for="title" class="form-label">{{ __('Titre') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required>

                            @error('title')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Auteur -->
                        <div class="form-group mb-4">
                            <label for="author" class="form-label">{{ __('Auteur') }}</label>
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror"
                                name="author" value="{{ old('author') }}" required>

                            @error('author')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label">{{ __('Catégorie') }}</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                name="category_id" required>
                                <option value="" disabled selected>{{ __('Choisir une catégorie') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Extrait -->
                        <div class="form-group mb-4">
                            <label for="excerpt" class="form-label">{{ __('Extrait') }}</label>
                            <textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror"
                                name="excerpt">{{ old('excerpt') }}</textarea>

                            @error('excerpt')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Contenu de l'article -->
                        <div class="form-group mb-4">
                            <label for="content" class="form-label">{{ __('Contenu') }}</label>
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror"
                                name="content" rows="6">{{ old('content') }}</textarea>

                            @error('content')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="form-group mb-4">
                            <label for="image" class="form-label">{{ __('Image de l\'article') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" accept="image/*">

                            @error('image')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Créer l\'article') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection