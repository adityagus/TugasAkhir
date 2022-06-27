<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\CategoryItem;
use Illuminate\Http\DB;
use App\Http\Request\InventoryRequest;
use App\Http\Requests\InventoryRequest as RequestsInventoryRequest;
use Illuminate\Support\Str;

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
        $items = Inventory::with(['category_items'])->get();
        
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
      return view('pages.admin.inventory.create', compact('items'));
      
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
        return view('pages.admin.inventory.detail', compact('inventory'));
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

    return redirect()->route('admin.inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventory $inventory)
    {
      $inventory->delete();

      return redirect()->route('admin.inventory.index');
    }
}
