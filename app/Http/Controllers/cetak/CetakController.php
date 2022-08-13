<?php

namespace App\Http\Controllers\cetak;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LoanItem;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CetakController extends Controller
{
  public function dataBarang(Request $request){
    $data = Inventory::where('studyprogram_id', '2')->with('category_items', 'studyprograms')->get();
    $html = view('pages.admin.inventory.cetakTl', compact('data'));
    $time = Carbon::now();
    $pdf = Pdf::loadView('pages.admin.inventory.cetakTl', compact('data', 'time'));
    
    // return $pdf->download('Rekapitulasi Stock Opname.pdf');
    return $pdf->stream();
    
    
    
    // $options = new Options();
    // $options->setTempDir('temp');
    // // $options->set('isRemoteEnabled' => true);
    // $dompdf = new Dompdf($options);
    // $dompdf->setOptions($options);
    // $dompdf-> loadHtml($html);
    
    // $dompdf->setPaper('A4', 'landscape');
    // $dompdf->render();
    // $dompdf->stream();
  }  
  
  
  public function cPeminjaman(Request $request, $id){
    

    $data = LoanItem::with(['inventory', 'transaction'])->get();
    $transaction = Transaction::with(['studies', 'labs'])->findOrFail($id);
    
    // dd($transaction);
    $html = view('pages.frontend.cetakpdf.ctkpeminjaman', compact('data', 'transaction'));
    $time = Carbon::now();
    $pdf = Pdf::loadView('pages.frontend.cetakpdf.ctkpeminjaman', compact('data', 'time', 'transaction'));
    
    // return $pdf->download('Rekapitulasi Stock Opname.pdf');
    return $pdf->stream();
  }
  public function cetakTe(){
    $data = Inventory::where('studyprogram_id', '1')->with('category_items', 'studyprograms')->get();
    $Kepalalab = User::where('roles_id', '1')->first();
    $html = view('pages.admin.inventory.cetakTe', compact('data', 'Kepalalab'));
    $time = Carbon::now();
    $pdf = Pdf::loadView('pages.admin.inventory.cetakTe', compact('data', 'time', 'Kepalalab'));
    
    // return $pdf->download('Rekapitulasi Stock Opname.pdf');
    return $pdf->stream();
  }
}

