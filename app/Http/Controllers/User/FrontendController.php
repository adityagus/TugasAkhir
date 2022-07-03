<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoanItem;

class FrontendController extends Controller
{ 
    public function home(request $request){
      $user = LoanItem::with(['peminjaman'])->get();
      return view('pages.frontend.home', [
        "item" => $user,
        "title" => "home"
      ]);
    }
    
    public function peminjaman(request $request){
      return view('pages.frontend.peminjaman', [
        "title" => "peminjaman"
      ]);
    }
    
    public function pengembalian(request $request){
      return view('pages.frontend.pengembalian', [
        "title" => "pengembalian"
      ]);
    }
    public function checkout(request $request){
      return view('pages.frontend.checkout', [
        "title" => "peminjaman"
      ]);
    }
    public function success(request $request){
      return view('pages.frontend.checkout-success', [
        "title" => "peminjaman"
      ]);
    }
    
    
    
    
    
    
}