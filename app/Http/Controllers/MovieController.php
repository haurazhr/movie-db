<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  public function index(){
    // $movies = Movie::latest()->take(9)->get(); // Ambil 9 film terbaru
    // return view('layouts.template', compact('movies'));

    $movies = Movie::latest()->paginate(6);

    return view('homepage', compact('movies'));
  
  }

  public function detail_movie($id, $slug){
    $movie = Movie::find($id);
    //dd($movie);
    return view('movie_detail', compact('movie'));
  }

  public function create(){
    
    $categories = Category::all();
    return view('movie_form', compact('categories'));


    return view('movie_form');
  }

  public function store(Request $request)
{
    // Proses upload cover
    $cover = $request->file('cover_image');
    $namaFileCover = time() . '_' . $cover->getClientOriginalName();
    $cover->move(public_path('covers'), $namaFileCover);

    Movie::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'synopsis' => $request->synopsis,
        'category_id' => $request->category_id,
        'year' => $request->year,
        'actors' => $request->actors,
        'cover_image' => 'covers/' . $namaFileCover, // simpan folder + nama file
    ]);

    return redirect('/')->with('success', 'Movie berhasil ditambahkan!');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}

public function dataMoviePage()
{
    $movies = Movie::with('category')->get();
    $categories = Category::all(); // TAMBAHKAN INI
    return view('admin.data_movie', compact('movies', 'categories'));
}

// Tampilkan form edit
public function edit($id)
{
    $movie = Movie::findOrFail($id);
    $categories = Category::all();
    return view('movie_edit', compact('movie', 'categories'));
}

// Proses update data
public function update(Request $request, $id)
{
    $movie = Movie::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|max:255',
        'synopsis' => 'required',
        'category_id' => 'required|exists:categories,id',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'actors' => 'required|string',
        'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Proses update cover image jika ada file baru
    if ($request->hasFile('cover_image')) {
        // Hapus gambar lama kalau ada
        if ($movie->cover_image && file_exists(public_path($movie->cover_image))) {
            unlink(public_path($movie->cover_image));
        }

        $cover = $request->file('cover_image');
        $fileName = time() . '_' . $cover->getClientOriginalName();
        $cover->move(public_path('covers'), $fileName);

        $validated['cover_image'] = 'covers/' . $fileName;
    }

    $validated['slug'] = Str::slug($request->title);

    $movie->update($validated);

    return redirect()->route('movie.data')->with('success', 'Movie berhasil diperbarui!');
}

public function destroy($id)
{
    $movie = Movie::findOrFail($id);

    // Hapus file cover jika ada
    if ($movie->cover_image && file_exists(public_path($movie->cover_image))) {
        unlink(public_path($movie->cover_image));
    }

    $movie->delete();

    return redirect()->route('movie.data')->with('success', 'Movie berhasil dihapus!');
}







}