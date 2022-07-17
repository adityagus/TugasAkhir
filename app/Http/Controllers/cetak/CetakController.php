<?php

namespace App\Http\Controllers\cetak;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CetakController extends Controller
{
  public function dataBarang(Request $request){
    $data = Inventory::with('category_items', 'labs')->get();
    $html = view('pages.admin.inventory.cetak', compact('data'));
    
    $pdf = Pdf::loadView('pages.admin.inventory.cetak', compact('data'));
    
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
}
