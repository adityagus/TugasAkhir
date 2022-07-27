<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class OtentikasiController extends Controller
{
    public function masuk(Request $request){
      $data = Mahasiswa::where('nama_mhs', $request->nama_mhs)->get();
      if($data){
        session(['berhasil_login'=> true ]); 
        return redirect('/peminjaman')->with('message', 'Silahkan Pilih Alat dan Bahan yang dipinjam');
      }
      // dd($request->all());
      
    }
    
    public function keluar(Request $request){
      $request->session()->flush();
      return redirect('/');
    }
}
