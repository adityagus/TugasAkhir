<?php

namespace App\Http\Controllers\admin;

use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
      
      public function home(Request $request){
      

        $transaction = Transaction::with(['studies', 'user'])->get();
        $transactionreturn = TransactionReturn::with(['user'])->get();

      
      return view('pages.admin.home', [
        'status' => LoanItem::count(),
        'jumlah_alat' => Inventory::count(),
        'user_pinjam' => Transaction::count(),
        'loan_pending' => Transaction::where('status', 'PENDING')->count(),
        'loan_success' => Transaction::where('status', 'SUCCESS')->count(),
        "items" => $transaction,
        "pengembalian" => $transactionreturn,
        "mhs" =>  Mahasiswa::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        "title" => "home"
      ]);
    
      
      
    }
}
