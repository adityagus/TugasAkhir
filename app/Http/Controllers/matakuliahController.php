<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class matakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $matakuliah = Study::get();
      return view('pages.admin.matakuliah.index',[
        'matakuliah' => $matakuliah
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
      return view('pages.admin.matakuliah.create')->with(['lalk' => 'lagi eroor']);
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
        'matakuliah' => 'required'
      ]);
      
      $data = $request->all();
      Study::create($data);
      
      return redirect()->route('admin.matakuliah.index');
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
      $study = Study::findOrFail($id);
      
        return view('pages.admin.matakuliah.edit',[
          'matakuliah' => $study
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
        'matakuliah' => 'required'
      ]);      
        $data = $request->all();
        $study = Study::findorFail($id);
        $study->update($data);
        
        return redirect()->route('admin.matakuliah.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Study::findOrFail($id);
        $study->delete();
        
        return redirect()->route('admin.matakuliah.index')->with('success', 'Data telah berhasil dihapus');
    }
}
