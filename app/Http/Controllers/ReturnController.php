<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanItem;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Notifications\Pengembalian;
use App\Http\Requests\CheckoutReturnRequest;
use App\Models\Inventory;
use Illuminate\Support\Facades\Notification;
use phpDocumentor\Reflection\Types\Nullable;

class ReturnController extends Controller
{
  public function return(CheckoutReturnRequest $request, Transaction $transaction, $id)
  {
    // return $request->all();
    //Get Carts Data 
    $loans = LoanItem::with('inventory')->get();
    $transactions = Transaction::with('user')->findOrFail($id);
    //Add to Transaction data 
  //Add to Transaction data 
    $transactionreturn = TransactionReturn::create([
      'transactions_id' => $transactions->id,
      'matakuliah_id' => $transactions->matakuliah_id,
      'labs_id' => $transactions->labs_id,
      'nim' => $transactions->nim,
      'name' => $transactions->name,
      'kondisi' => $request->kondisi,
      'keterangan' => $request->keterangan,
      'kelas' => $transactions->kelas,
      'phone' => $transactions->phone,
      'pertemuan_ke' => $transactions->pertemuan_ke,
      'keperluan' => $transactions->keperluan,
      'status' => $request->status,
      'tgl_peminjaman' => $transactions->created_at
    ]);
    
    // dd($transactionreturn);


    // $data['total_price'] = $carts->sum('inventory.jumlah');

    //Create transaction item 

    //Create transaction item graph
    foreach ($loans as $loan) {
      $items[] = ReturnItem::create([
        'transactionreturn_id' => $transactionreturn->id,
        'total' => $loan->total,
        'inventory_id' => $loan->inventory_id
      ]);
      
      // mengecek data
      $inventory = Inventory::where('id', $loan->inventory_id)->first();
      // menghitung ketersedian
      $inventory->dipinjam -= $loan->total;
      // menyimpan data 
      $inventory->save();
      
      $loan->delete();
    }


    //Delete cart after transaction 
    //Delete cart after transaction 
    //Delete cart after transaction 
    //Delete cart after transaction 
    //Delete cart after transaction 
    $transactions->delete();



    return redirect()->route('admin.transaction.index')->with('success', 'Pengembalian sedang di Verifikasi!');
  }
  
  
  public function deletebarang($id){
    $data = LoanItem::with(['transaction'])->findOrFail($id);
      
    $data->delete();
      
    return redirect()->route('admin.transaction.show', $data->transaction->id);
    }
    
    
  
  
  
  
}
