<?php

namespace App\Http\Controllers;

use App\Models\LoanItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionReturn;
use App\Http\Requests\TransactionReturnRequest;

class TransactionReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pengembalian = TransactionReturn::with(['user'])->get();
      // dd($transaction);
      return view('pages.admin.pengembalian.index', compact('pengembalian'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionReturn $return)
    {
      $loanItem =  LoanItem::with(['inventory'])->where('transactions_id', $return->id)->get();
      
      return view('pages.admin.pengembalian.show',[
        'pengembalian' => $return,
        'loanitem' => $loanItem
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionReturn $return)
    {
      return view('pages.admin.pengembalian.edit', compact('return'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionReturnRequest $request, TransactionReturn $return)
    {
        $data = $request->all();
        $return->update($data);
  
        return redirect()->route('admin.return.index');
        
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
