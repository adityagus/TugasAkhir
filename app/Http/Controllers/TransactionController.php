<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Notifications\Pengembalian;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests\CheckoutReturnRequest;
use Illuminate\Support\Facades\Notification;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $transaction = Transaction::with(['studies', 'labs'])->get();
        // dd($transaction);
        return view('pages.admin.transaksi.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    
      // pengembalian alat dan bahan


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request, Transaction $transaction)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.admin.transaksi.edit', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
      // dd($transaction);
      // $transaction = Transaction::with(['studies'])->all();
      $loanItem =  LoanItem::with(['inventory'])->where('transactions_id', $transaction->id)->get();
      // $transaction = Transaction::find($transaction);
      // $apa = LoanItem::find($loanItem);
      // dd($apa);
      // dd($transaction);
      return view('pages.admin.transaksi.show',[
        'transaction' => $transaction,
        'loanitem' => $loanItem
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
      $data = $request->all();
      $transaction->update($data);

      return redirect()->route('admin.transaction.index');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
