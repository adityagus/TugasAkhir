<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $laboratorium = Lab::get();
      return view('pages.admin.laboratorium.index',[
        'labs' =>  $laboratorium
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.laboratorium.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required'
      ]);
      $data = $request->all();
      Lab::create($data);
      
      return redirect()->route('admin.laboratorium.index');
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
       $laboratorium = Lab::findOrFail($id);
       
       return view('pages.admin.laboratorium.edit',[
        'lab' => $laboratorium
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required'
      ]);
      $data = $request->all();
      $laboratorium = lab::findorFail($id);
      $laboratorium->update($data);
      
      return redirect()->route('admin.laboratorium.index')->with('success', 'Laboratorium berhasil di ubah');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laboratorium = Lab::findOrFail($id);
        $laboratorium->delete();
        
        return redirect()->route('admin.laboratorium.index')->with('success', 'Laboratorium berhasil dihapus');
    }
}
