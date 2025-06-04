@extends('layouts.template')

@section('title','Edit Movie')

@section('content')

<h1>Edit Movie</h1>

<div class="mb-3 row">
    <div class="col-sm-10">
        <a href="{{ route('movie.data') }}" class="btn btn-primary">Data Movie</a>
    </div>
</div>

<form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
        </div>
    </div>

    {{-- Synopsis --}}
    <div class="mb-3 row">
        <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>
    </div>

    {{-- Category --}}
    <div class="mb-3 row">
        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="" disabled>-- Pilih Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $movie->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Year --}}
    <div class="mb-3 row">
        <label for="year" class="col-sm-2 col-form-label">Year</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $movie->year) }}" required min="1900" max="{{ date('Y') }}">
        </div>
    </div>

    {{-- Actors --}}
    <div class="mb-3 row">
        <label for="actors" class="col-sm-2 col-form-label">Actors</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="actors" name="actors" value="{{ old('actors', $movie->actors) }}" placeholder="Contoh: Tom Holland, Zendaya" required>
        </div>
    </div>

    {{-- Cover Image --}}
    <div class="mb-3 row">
        <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*">
            @error('cover_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="cover_image" class="col-sm-2 col-form-label">Old Image</label>
            @if ($movie->cover_image)
                <div class="mt-2">
                    <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" alt="Cover" width="120">
                </div>
            @endif
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
    </div>

    {{-- Submit Button --}}
    <div class="mb-3 row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

@endsection
