<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ 
    public function index(request $request){
      return view('pages.user.dashboard');
    }
    
    public function loan(request $request){
      return view('pages.user.peminjaman');
    }
    
}
