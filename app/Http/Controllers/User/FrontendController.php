<?php

namespace App\Http\Controllers\User;

use App\Mail\Email;
use App\Models\Cart;
use App\Models\User;
use App\Models\Study;
use App\Models\Gallery;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Notifications\Peminjaman;
use App\Http\Requests\LoanRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\Pengembalian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\CheckoutReturnRequest;
use Illuminate\Support\Facades\Notification;

class FrontendController extends Controller
{ 
    public function home(Request $request, Inventory $inventory){
      
        if (Auth::check() == true) {
          $loanItem = LoanItem::with(['inventory', 'transaction'])->where('users_id', Auth::user()->id)->get();
        }else {
          $loanItem = LoanItem::with(['inventory'])->get();
      }
      

      
      
      return view('pages.frontend.index', [
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

      if (Auth::check() == true) {
        $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      }
      else {
        $inCarts = Cart::count();
      }
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
      $matakuliah = Study::all();
      $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      $carts = Cart::with(['inventory'])->where('users_id', Auth::user()->id)->get();
      
      
      // dd($matakuliah):
      // $data = LoanItem::with('study')->get();
      return view('pages.frontend.cart', [
        "title" => "cart",
        "carts" =>  $carts,
        'inCart' => $inCarts,
        'studies' => $matakuliah,
        
        // "study" => $data,
      ]);
    }
    
    public function read(Request $request)
    {
      $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      $carts = Cart::with(['inventory'])->where('users_id', Auth::user()->id)->get();
      
      // $data = LoanItem::with('study')->get();
      return view('pages.frontend.ajax.tabelcart', [
        "title" => "cart",
        "carts" =>  $carts,
        'inCart' => $inCarts,
        
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
      
      return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }
    // peminjaman alat dan bahan
    public function checkout(CheckoutRequest $request, LoanRequest $loanRequest){
      $data = $request->all();

      
      //Get Carts Data 
      $carts = Cart::with('inventory')->where('users_id', Auth::user()->id)->get();
      
      //Add to Transaction data 
      $data['name'] = Auth::user()->name;
      // $email = $request->email;
      $data['users_id'] = Auth::user()->id;
      $user = User::with(['roles'])->get();
      // dd( $data['waktupeminjaman']);
      // $data['total_price'] = $carts->sum('inventory.jumlah');
      
      //Create transaction item 
      $transactions = Transaction::create($data);
      
      //Create transaction item 
      foreach ($carts as $cart ) {
        $items[] = LoanItem::create([
          'transactions_id' => $transactions->id,
          'users_id' => $cart->users_id,
          'total' => $loanRequest->total,
          'inventory_id' => $cart->inventories_id
        ]);
      }
      // 
      // $get1 = LoanItem::with(['inventory'])->where('inventory_id', $carts->inventories_id );
      // dd($get1);n
      // $transaction = 
      
      // if ($loanRequest->total) {
      //   $loanItem->total += $loanRequest;
      // }
      
      //Delete cart after transaction 
      Cart::where('users_id', Auth::user()->id)->delete();
      
      // redirect route 
      $user = User::with('roles')->where('roles_id', 1 )
                                  ->orWhere('roles_id', 2)
                                  ->get();
      
      
      $data = [
        'greeting' => "Halo Sobat Siman",
        'subject' => 'Peminjaman Barang',
        'line1' => 'Ada Mahasiswa Yang ingin Meminjam Barang',
        'action' => 'Approval now',
        'line2' => 'Abaikan Pesan ini apabila sudah di approve'
      ];

        
        // $user->notify(new Informasi($data));
        Notification::send($user, new Peminjaman($data));
        return redirect()->route('success');

  

      // // message
      // $pesan = [
      //   'line1' => 'Hello Ini Line1',
      //   'action' => 'Hello ini action nya',
      //   'line2' => 'Hello ini line 2'
      // ];
      // // notification
      // $admin->notify(new Informasi($pesan));
      
    }
    
    // pengembalian alat dan bahan
    public function return(CheckoutReturnRequest $request){
      
      //Get Carts Data 
       //Get Carts Data 
      //Get Carts Data 
      $loans = LoanItem::with('inventory')->where('users_id', Auth::user()->id)->get();
      $transactions = Transaction::with('user')->where('users_id', Auth::user()->id)->first();
      
      //Add to Transaction data 
       //Add to Transaction data 
      //Add to Transaction data 
      
        $transactionreturn = TransactionReturn::create([ 
          'users_id' => Auth::user()->id,  
          'name' => Auth::user()->name,  
          'transactions_id' => $transactions->id,
          'nim' => $transactions->nim,
          'kondisi' => $request->kondisi,
          'keterangan' => $request->keterangan,
          'kelas' => $transactions->kelas,
          'phone' => $transactions->phone,
          'pertemuan_ke' => $transactions->pertemuan_ke,
          'keperluan' => $transactions->keperluan,
          'laboratorium' => $transactions->laboratorium,
        ]);
      
      
       // $data['total_price'] = $carts->sum('inventory.jumlah');
       
       //Create transaction item 
       
       //Create transaction item graph
       foreach ($loans as $loan ) {
         $items[] = ReturnItem::create([
           'transactionreturn_id' => $transactionreturn->id,
           'users_id' => $loan->users_id,
          //  'total' => $loan->total,
           'inventory_id' => $loan->inventory_id
         ]);
       }

       
       
       //Delete cart after transaction 
       LoanItem::where('users_id', Auth::user()->id)->delete();
       Transaction::where('users_id', Auth::user()->id)->delete();
       

       
      //  configuration
       $user = User::with('roles')->where('roles_id', 1 )
       ->orWhere('roles_id', 2)
       ->get();

      //  data to email
      $data = [
      'greeting' => "Halo Sobat Siman",
      'subject' => 'Pengembalian Barang',
      'line1' => 'Ada Mahasiswa Yang ingin Mengembalikan Barang',
      'action' => 'Approval now',
      'line2' => 'Abaikan Pesan ini apabila sudah di approve'
      ];


      // $user->notify(new Informasi($data));
      Notification::send($user, new Pengembalian($data));
      
      return redirect()->route('pengembalian')->with('success', 'Pengembalian sedang di Verifikasi!');
       
       
       
     }
    
    public function informasi(Request $request){
      
      return view('pages.frontend.information',[
        "title" => "informasi",
      ]);
    }
    
    
    public function details(request $request, $slug){
      
      $item = Inventory::with(['galleries'])->where('slug', $slug)->firstOrFail();
      // $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      if (Auth::check() == true) {
        $inCarts = Cart::where('users_id', Auth::user()->id)->count();
      }
      else {
        $inCarts = Cart::count();
      }
      
      // dd($item);
      return view('pages.frontend.detail', [
        'inventory' => $item,
        "title" => "peminjaman",
        'inCart' => $inCarts
      ]);
      
    }
    
    public function pengembalian(request $request){
      if (Auth::user() == true) {
        $loanItem = LoanItem::with('inventory' , 'transaction')->where('users_id', Auth::user()->id)->get();
      }else{
        $loanItem = LoanItem::with('inventory' , 'transaction')->get();
        
      }
      
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