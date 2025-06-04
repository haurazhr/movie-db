@extends('layouts.template')

@section('title','Form input movie')

@section('content')

<h1 class="mb-4">Form Data Movie</h1>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div id="movieTable" class="table-responsive">
    <table class="table table-bordered table-striped table-hover shadow-sm align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actor</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $index => $movie)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">
                        @if($movie->cover_image)
                            <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" style="width: 60px; height: 90px; object-fit: cover;" class="rounded">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category->category_name }}</td>
                    <td>{{ $movie->actors }}</td>
                    <td class="text-center">{{ $movie->year }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                            <a href="/movie/{{$movie->id}}/{{$movie->slug}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are You Sure to Delete?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
