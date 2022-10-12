<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class OtentikasiController extends Controller
{
    public function masuk(Request $request, Mahasiswa $mahasiswa){
      // $data = $request->session()->all();
      $items = Mahasiswa::where('nama_mhs', $request->nama_mhs)->firstOrFail();
      $carts = Cart::all();

      // foreach ($items as $item) {
        # code...
          session([$items->nim, $items->nama_mhs, $items->kelas]);
          
          foreach ($carts as $cart) {
            $cart->delete();
          }
          
          
          
          session(['berhasil_login'=> true ]); 
          return redirect('/alat-dan-bahan')->with('message', 'Silahkan Pilih Alat dan Bahan yang dipinjam');
      // }
      // dd($request->all());
      
    }
    
    public function keluar(Request $request){
      $carts = Cart::where('users_id', session()->get(0))->get();
      
      $request->session()->flush();
      foreach ($carts as $cart) {
        $cart->delete();
      }
      return redirect('/');
    }
}
