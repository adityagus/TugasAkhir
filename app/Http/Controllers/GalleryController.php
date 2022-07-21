<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Gallery::with(['inventory'])->get();

        return view('pages.admin.gallery.index', [
          'items' => $item
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $inventory = Inventory::all();
        return view('pages.admin.gallery.create' ,[
          'inventory' => $inventory
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all(); 
        $data['image'] = $request->file('image')->store(
          'assets/gallery', 'public'
        );
        

        Gallery::create($data);
        return redirect()->route('admin.gallery.index');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item  = Gallery::findOrFail($id);
        $inventories = Inventory::all();

        return view ('pages.admin.gallery.edit', [
          'item' => $item,
          'inventories' => $inventories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
      $data = $request->all();
      
      $data['image'] = $request->file('image')->store(
        'assets/gallery', 'public'  
      );

      $item = Gallery::findOrFail($id);
      $item->update($data);
      
      return redirect()->route('admin.gallery.index');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.gallery.index');
    }
}
