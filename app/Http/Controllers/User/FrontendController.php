<?php

namespace App\Http\Controllers\User;

use App\Mail\Email;
use App\Models\Lab;
use App\Models\Cart;
use App\Models\User;
use App\Models\Study;
use App\Models\Gallery;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Mahasiswa;
use App\Models\ReturnItem;
use App\Models\Transaction;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Notifications\Peminjaman;
use App\Http\Requests\LoanRequest;
use Illuminate\Support\Facades\DB;
use App\Notifications\Pengembalian;
use App\Http\Controllers\Controller;
use App\Http\Middleware\isMahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\CheckoutReturnRequest;
use Illuminate\Support\Facades\Notification;

class FrontendController extends Controller
{
  public function home(Request $request)
  {

    $loanItem = LoanItem::with(['inventory', 'transaction.labs', 'transaction'])->get();
    

    // dd($request->session()->has('data'));


    return view('pages.frontend.index', [
      'status' => LoanItem::count(),
      'jumlah_alat' => Inventory::count(),
      'user_pinjam' => Transaction::count(),
      'loan_pending' => Transaction::where('status', 'PENDING')->count(),
      'loan_success' => Transaction::where('status', 'SUCCESS')->count(),
      "items" => $loanItem,
      "mhs" =>  Mahasiswa::latest()->filter(request(['search']))->paginate(1)->withQueryString(),
      "title" => "home"
    ]);
  }

  public function barang(Request $request, Mahasiswa $mahasiswa)
  {
    $inCarts = Cart::count();

    $data = Inventory::with(['studyprograms', 'loan_items', 'category_items'])->get();
    
    
    return view('pages.frontend.barang', [
      'items' => $data,
      "title" => "barang",
      'inCart' => $inCarts
    ]);
  }
  
  public function updatetocart(Request $request,$id)
  {
    
    Cart::where('id', $id)->update([
      'inven_qty' => $request->inven_qty,
    ]);
    return redirect()->back()->with('cart_update', 'Quantity Updated');

  }


  public function peminjaman(request $request)
  {
    $transaction = Transaction::with(['user', 'labs'])->get();
    $transactionreturns = TransactionReturn::get();

    // dd($transaction);

    return view('pages.frontend.peminjaman', [
      'transaction' => $transaction,
      'transactionreturn' => $transactionreturns,
      "title" => "peminjaman"
    ]);
  }

  public function pengembalian(request $request)
  {
    $transactionreturn = TransactionReturn::get();
    // dd($transaction);

    return view('pages.frontend.pengembalian', [
      'items' => $transactionreturn,
      "title" => "pengembalian"

    ]);
  }


  public function cart(Request $request, Mahasiswa $mahasiswa)
  {
    $matakuliah = Study::all();
    $labs = Lab::all();
    $inCarts = Cart::count();
    $carts = Cart::with(['inventory', 'inventory.studyprograms'])->get();

    // dd($matakuliah):
    // $data = LoanItem::with('study')->get();
    return view('pages.frontend.cart', [
      "title" => "cart",
      "carts" =>  $carts,
      'inCart' => $inCarts,
      'studies' => $matakuliah,
      'labs' => $labs


      // "study" => $data,
    ]);
  }

  public function cartAdd($id)
  {
    // 
    Cart::create([
      'inventories_id' => $id,
    ]);
    // public function pengurangan 
    return redirect()->route('barang');
  }

  public function read(Request $request)
  {
    $inCarts = Cart::count();
    $carts = Cart::with(['inventory'])->get();

    // $data = LoanItem::with('study')->get();
    return view('pages.frontend.ajax.tabelcart', [
      "title" => "cart",
      "carts" =>  $carts,
      'inCart' => $inCarts,

      // "study" => $data,
    ]);
  }

  public function cartDelete(Request $request, $id)
  {
    $data = Cart::findOrFail($id);
    $data->name = $request->name;

    $data->delete();

    return redirect()->route('cart', '#laporan');
  }

  public function informasi(Request $request)
  {

    return view('pages.frontend.information', [
      "title" => "informasi",
    ]);
  }



  // peminjaman alat dan bahan
  public function checkout(CheckoutRequest $request, LoanRequest $loanRequest)
  {
    $data = $request->all();

    //Get Carts Data 
    $carts = Cart::with('inventory')->get();
    
    
    

    //Add to Transaction data 
    $data['name'] = $request->name;
    $email = $request->email;
    $user = User::with(['roles'])->get();

    // sisa stok barang
    // $sisa = 

    //Create transaction item 
    $transactions = Transaction::create($data);

    //Create transaction item

    foreach ($carts as $cart) {
      $items[] = LoanItem::create([
        'transactions_id' => $transactions->id,
        'total' => $cart->inven_qty,
        'inventory_id' => $cart->inventories_id
      ]);
      
      // mengecek data
      $inventory = Inventory::where('id', $cart->inventories_id)->first();
      // menghitung ketersedian
      if ($inventory->dipinjam == 0) {
        $inventory->dipinjam = $cart->inven_qty;
      }else {
        $inventory->dipinjam += $cart->inven_qty;
      }
      // menyimpan data 
      $inventory->save();
      
      
      
      $cart->delete();
    }
    // 
    // $get1 = LoanItem::with(['inventory'])->where('inventory_id', $carts->inventories_id );
    // dd($get1);n
    // $transaction = 

    // if ($loanRequest->total) {
    //   $loanItem->total += $loanRequest;
    // }

    //Delete cart after transaction 

    // redirect route 
    $user = User::with('roles')->where('roles_id', 1)
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


  // detail alat dan bahan
  public function details(request $request, $slug)
  {

    $item = Inventory::with(['galleries'])->where('slug', $slug)->firstOrFail();
    // $inCarts = Cart::where('users_id', Auth::user()->id)->count();
    if (Auth::check() == true) {
      $inCarts = Cart::where('users_id', Auth::user()->id)->count();
    } else {
      $inCarts = Cart::count();
    }

    // dd($item);
    return view('pages.frontend.detail', [
      'inventory' => $item,
      "title" => "peminjaman",
      'inCart' => $inCarts
    ]);
  }

  public function show(Transaction $transaction, $id)
  {
    // dd($transaction);
    // $transaction = Transaction::with(['studies'])->all();
    $transaction = Transaction::with(['studies', 'labs'])->findOrFail($id);
    $loanItem =  LoanItem::with(['inventory'])->where('transactions_id', $transaction->id)->get();

    // $transaction = Transaction::find($transaction);
    // $apa = LoanItem::find($loanItem);
    // dd($apa);
    // dd($transaction);
    return view('pages.frontend.showpeminjaman', [
      'transaction' => $transaction,
      'loanitem' => $loanItem,
      'title' => 'peminjaman'
    ]);
    
  }
  
    
  public function showpengembalian(Transaction $transaction, $id)
  {
    // dd($transaction);
    // $transaction = Transaction::with(['studies'])->all();
    $transaction = TransactionReturn::with(['transaction.studies', 'transaction.labs'])->findOrFail($id);
    // dd($transaction);
    $loanItem =  ReturnItem::with(['inventory'])->where('transactionreturn_id', $transaction->id)->get();

    // $transaction = Transaction::find($transaction);
    // $apa = LoanItem::find($loanItem);
    // dd($apa);
    // dd($transaction);
    return view('pages.frontend.showpengembalian', [
      'transactionreturn' => $transaction,
      'returnitem' => $loanItem,
      'title' => 'peminjaman'
    ]);
  }





  public function success(request $request)
  {

    return view('pages.frontend.checkout-success', [
      "title" => "cart"
    ]);
  }

  public function history()
  {
    $transactionreturn = Transactionreturn::with(['user'])->get();
    // dd($transaction);

    return view('pages.frontend.history', [
      'transaction' => $transactionreturn,
      "title" => "history"
    ]);
  }
}
