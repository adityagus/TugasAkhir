<?php

namespace App\Http\Controllers\mahasiswa;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
  public function index()
    {
      $items = Mahasiswa::latest()->filter(request(['search']))->paginate(7)->withQueryString();
      dd($items);
      
      return view('pages.frontend.home', [
        "title" => "Mahasiswa",
        "active" => 'posts',
        "mhs" =>  Mahasiswa::latest()->filter(request(['search']))->paginate(7)->withQueryString()
      ]);
    }
}
