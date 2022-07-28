<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Gallery;
use Illuminate\Http\DB;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\CategoryItem;
use Illuminate\Http\Request;
use App\Http\Request\InventoryRequest;
use App\Http\Requests\InventoryRequest as RequestsInventoryRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // "posts" =>  Post::all()
         
        $items = Inventory::with(['category_items', 'labs'])->get();
        
        // dd($items);
        return view('pages.admin.inventory.index', [
          "title" => "inventaris",
          'items' => $items
          
        ]);
        
        
      }
      


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $items = CategoryItem::all();
      $galleries = Gallery::all();
      return view('pages.admin.inventory.create', [
        'items' => $items,
        'gallery' => $galleries,
      ]);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsInventoryRequest $request)
    {
      $data = $request->all();
      $slug1 = '-' . $request->jumlah;
      $data['slug'] = Str::slug($request->nama . $slug1) ;

 

      Inventory::create($data);

      return redirect()->route('admin.inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(inventory $inventory)
    {
      $item = Gallery::where('inventories_id', $inventory->id)->get(); 
      // dd($item);
      return view('pages.admin.inventory.detail', [
        'inventory' => $inventory,
        'items' => $item
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(inventory $inventory)
    {
      $data = CategoryItem::all();
      return view('pages.admin.inventory.edit',[
        'item' => $inventory ,
        'items' => $data,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsInventoryRequest $request, inventory $inventory)
    {
      $data = $request->all();
      $slug1 = '-' . $request->jumlah;
      $data['slug'] = Str::slug($request->nama . $slug1) ;

      $inventory->update($data);

    return view('pages.admin.transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventory $inventory)
    {
      // $data = array()
      $inventory->delete();

      return redirect()->route('admin.inventory.index')->with('success', 'Data Berhasil Ke Hapus');
    }
    
}
