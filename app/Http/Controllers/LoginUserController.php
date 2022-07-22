<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('mahasiswa');
  }
  
  public function authenticate(Request $request, Mahasiswa $mhs){
    $mhs = $request->validate([
      'nama_mhs' => 'required|string',
      'nim' => 'required'
      
    ]);
    
    if(Auth::login($mhs)){
      $request->session()->regenerate();
      return redirect()->intended("/peminjaman");
    }
    
    return back()->with('loginError', 'login failed!');
    
    
  }
  
  
    
}
