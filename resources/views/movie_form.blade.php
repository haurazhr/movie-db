@extends('layouts.template')

@section('title','Form input movie')

@section('content')

{{-- form movie --}}
<h1>Form Data Movie</h1>

 <div class="mb-3 row">
    <div class="col-sm-10">
        <a href="{{ route('movie.data') }}" class="btn btn-primary">Data Movie</a>
    </div>
</div>


<form action="/movie/store" method="POST" enctype="multipart/form-data">
    @csrf {{-- Jangan lupa token CSRF untuk keamanan --}}

    {{-- Title --}}
<div class="mb-3 row">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Synopsis --}}
<div class="mb-3 row">
    <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
    <div class="col-sm-10">
        <textarea class="form-control @error('synopsis') is-invalid @enderror" id="synopsis" name="synopsis" rows="5" required>{{ old('synopsis') }}</textarea>
        @error('synopsis')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Category --}}
<div class="mb-3 row">
    <label for="category_id" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="" disabled selected>-- Pilih Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Year --}}
<div class="mb-3 row">
    <label for="year" class="col-sm-2 col-form-label">Year</label>
    <div class="col-sm-10">
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" required min="1900" max="{{ date('Y') }}">
        @error('year')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Actors --}}
<div class="mb-3 row">
    <label for="actors" class="col-sm-2 col-form-label">Actors</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('actors') is-invalid @enderror" id="actors" name="actors" placeholder="Contoh: Tom Holland, Zendaya" value="{{ old('actors') }}" required>
        @error('actors')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Cover Image --}}
<div class="mb-3 row">
    <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
    <div class="col-sm-10">
        <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*" required>
        @error('cover_image')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Submit Button --}}
<div class="mb-3 row">
    <div class="col-sm-10 offset-sm-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>


</form>

@endsection