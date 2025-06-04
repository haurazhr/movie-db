@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow p-4">
                <div class="row g-4 align-items-start">
                    
                    {{-- Cover Image --}}
                    <div class="col-12 col-md-4 text-center">
                        <img 
                            src="{{ asset($movie->cover_image) }}" 
                            alt="{{ $movie->title }}" 
                            class="img-fluid rounded shadow-sm w-100" 
                            style="max-height: 450px; object-fit: cover;"
                        >
                    </div>

                    {{-- Movie Details --}}
                    <div class="col-12 col-md-8">
                        <h2 class="fw-bold mb-3">{{ $movie->title }}</h2>
                        
                        <p class="text-muted" style="text-align: justify;">
                            {{ $movie->synopsis }}
                        </p>

                        <div class="mt-4">
                            <p><strong>Actors:</strong> {{ $movie->actors }}</p>
                            <p><strong>Category:</strong> {{ $movie->category->category_name }}</p>
                            <p><strong>Year:</strong> {{ $movie->year }}</p>
                        </div>

                        <a href="{{ url('/') }}" class="btn btn-success mt-4 px-4">
                            ← Back to Home
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
