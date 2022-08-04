<?php

namespace App\Http\Controllers\mahasiswa;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
  public function index()
    {
      $items = Mahasiswa::latest()->filter(request(['search']))->paginate(1)->withQueryString();
      dd($items);
      

    }
}
