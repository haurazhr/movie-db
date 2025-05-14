<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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



}