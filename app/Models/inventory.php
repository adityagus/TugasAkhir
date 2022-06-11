<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inventory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
      'id', 'category_id', 'kd_brg', 'nama', 'deksripsi', 'jumlah', 'satuan', 'slug'
    ];
    
    // public function category_item()
    // last
    // menampilkan database ke index di peminjaman alat
    // membuat admin database index, edit show ,store    //important mengerjakan admin terdahulu
    // menampilkan database peminjaman
    
    // membuat sidebar admin dan halaman admin terdahulu 
}
