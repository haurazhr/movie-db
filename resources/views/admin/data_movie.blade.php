@extends('layouts.template')

@section('title','Form input movie')

@section('content')

{{-- form movie --}}
<h1>Form Data Movie</h1>


{{-- Tabel Data Movie --}}
<div id="movieTable">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
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
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->category->category_name }}</td>
                    <td>{{ $movie->actors }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>
                    <a href="/movie/{{$movie->id}}/{{$movie->slug}}" class="btn btn-info btn-sm">Detail</a>
                     <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                         <form action="{{ route('movie.destroy', $movie->id) }}" method="POST" style="display:inline;">
                             @csrf
                             @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Delete</button>
                        </form>
                        </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
