<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\User;
use App\Models\Gallery;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\CheckoutReturnRequest;

class FrontendController extends Controller
{ 
    public function home(Request $request){
      
        if ($request->user()) {
          $loanItem = LoanItem::with(['inventory', 'transaction'])->get();
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
        "mhs" =>  Mahasiswa::latest()->filter(request(['search']))->paginate(7)->withQueryString(),
        "title" => "home"
      ]);
    }
    
    public function peminjaman(request $request){
      $inCarts = Cart::count();
        $data = Inventory::with('category_items', 'labs', 'loan_items')->get();
        // dd($data);
      return view('pages.frontend.peminjaman', [
        'items' => $data, 
        "title" => "peminjaman",
        'inCart' => $inCarts
      ]);
    }
    
    public function cart(Request $request)
    {
      $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      $carts = Cart::with(['inventory'])->where('users_id', Auth::user()->id)->get();
      // $data = LoanItem::with('study')->get();
      return view('pages.frontend.cart', [
        "title" => "cart",
        "carts" =>  $carts,
        'inCart' => $inCarts
        
        // "study" => $data,
      ]);
    }
    
    public function cartAdd(request $request, $id){
      Cart::create([
        'users_id' => Auth::user()->id,
        'inventories_id' => $id,
      ]);
      // public function pengurangan 
      return redirect()->route('peminjaman');
       
    }
    
    public function cartDelete(Request $request, $id){
      $data = Cart::findOrFail($id);
      $data->name = $request->name;
      
      $data->delete();
      
      return redirect()->route('cart');
    }
    
    public function checkout(CheckoutRequest $request){
     $data = $request->all();
      
      //Get Carts Data 
      $carts = Cart::with('inventory')->where('users_id', Auth::user()->id)->get();
      
      //Add to Transaction data 
      $data['nama'] = Auth::user()->name;
      $data['users_id'] = Auth::user()->id;
      // $data['total_price'] = $carts->sum('inventory.jumlah');
      
      //Create transaction item 
      $transactions = Transaction::create($data);
      
      //Create transaction item 
      foreach ($carts as $cart ) {
        $items[] = LoanItem::create([
          'transactions_id' => $transactions->id,
          'users_id' => $cart->users_id,
          'inventory_id' => $cart->inventories_id
        ]);
      }
      
      //Delete cart after transaction 
      Cart::where('users_id', Auth::user()->id)->delete();
      
      return redirect()->route('success');
      
      //Configuration 
      
      // Setup Variabel midtrans
      
      // payment process
      
    }
    
    public function return(CheckoutReturnRequest $request){
      // return $request->all();
       
       //Get Carts Data 
       $loans = LoanItem::with('inventory')->where('users_id', Auth::user()->id)->get();
       $transactions = Transaction::with('user')->where('users_id', Auth::user()->id)->get();
       
       //Add to Transaction data 
       $data['nama'] = Auth::user()->name;
       $data['users_id'] = Auth::user()->id;
      $data["transaction_id"] = $transactions->id;
       // $data['total_price'] = $carts->sum('inventory.jumlah');
       
       //Create transaction item 
       $transactionsreturn = TransactionReturn::create($data);
       
       //Create transaction item graph
       foreach ($loans as $loan ) {
         $items[] = ReturnItem::create([
           'transactionreturn_id' => $transactionsreturn->id,
           'users_id' => $loan->users_id,
          //  'total' => $loan->total,
           'inventory_id' => $loan->inventories_id
         ]);
       }
       
       foreach ($transactions as $transaction) {
        $items[] = TransactionReturn::create([
        'transactions_id' => $transaction->id,  
        'name' => $transaction->name,
        'nim' => $transaction->nim,
        'kelas' => $transaction->kelas,
        'phone' => $transaction->pertemuan_ke,
        'keperluan' => $transaction->laboratorium,
        
        ]);
       }
       
       //Delete cart after transaction 
       Cart::where('users_id', Auth::user()->id)->delete();
       Transaction::where('users_id', Auth::user()->id)->delete();
       
       return redirect()->route('index');
       
       //Configuration 
       
       // Setup Variabel midtrans
       
       // payment process
       
       
       
     }
    
    
    
    
    public function details(request $request, $slug){
      
      $item = Inventory::with(['galleries'])->where('slug', $slug)->firstOrFail();
      $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      
      
      // dd($item);
      return view('pages.frontend.detail', [
        'inventory' => $item,
        "title" => "peminjaman",
        'inCart' => $inCarts
      ]);
      
    }
    
    public function pengembalian(request $request){
      $loanItem = LoanItem::with('inventory' , 'transaction')->where('users_id', Auth::user()->id)->get();
      
      return view('pages.frontend.pengembalian', [
        'items' => $loanItem,
        "title" => "pengembalian"
      ]);
    }

    public function success(request $request){
      return view('pages.frontend.checkout-success', [
        "title" => "cart"
      ]);
    }
    
    
    
}