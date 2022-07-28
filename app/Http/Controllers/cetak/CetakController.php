<?php

namespace App\Http\Controllers\cetak;

use Carbon\Carbon;
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
    $data = Inventory::with('category_items', 'labs')->get();
    $html = view('pages.admin.inventory.cetak', compact('data'));
    $time = Carbon::now();
    $pdf = Pdf::loadView('pages.admin.inventory.cetak', compact('data', 'time'));
    
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
  
  
  public function cPeminjaman(Request $request){
    

    $data = LoanItem::with(['inventory', 'transaction'])->get();
    $transaction = Transaction::with(['studies'])->where('users_id',Auth::user()->id)->first();
    
    // dd($transaction);
    // $html = view('pages.admin.inventory.cetak', compact('data', 'transaction'));
    $time = Carbon::now();
    $pdf = Pdf::loadView('pages.frontend.cetakpdf.ctkpeminjaman', compact('data', 'time', 'transaction'));
    
    // return $pdf->download('Rekapitulasi Stock Opname.pdf');
    return $pdf->stream();
  }
}
