<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\LoanItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{ 
    public function home(Request $request){
      
      if ($request->user()) {
        $loanItem = LoanItem::with(['inventory'])->where('transactions_id', Auth::user()->id)->get();
      }else {
        $loanItem = LoanItem::with(['inventory'])->get();
      }
      
      return view('pages.frontend.home', [
        'status' => LoanItem::count(),
        'jumlah_alat' => Inventory::count(),
        'user_pinjam' => Transaction::count(),
        'loan_pending' => Transaction::where('status', 'PENDING')->count(),
        'loan_success' => Transaction::where('status', 'SUCCESS')->count(),
        "items" => $loanItem,
        "title" => "home"
      ]);
    }
    
    public function peminjaman(request $request){
      $data = Inventory::with('category_items', 'labs', 'loan_items')->get();
      return view('pages.frontend.peminjaman', [
        'items' => $data, 
        "title" => "peminjaman"
      ]);
    }
    public function details(request $request){
      $data = Inventory::with('category_items', 'labs', 'loan_items')->get();
      return view('pages.frontend.peminjaman', [
        'items' => $data, 
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