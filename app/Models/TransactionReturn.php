<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionReturn extends Model
{
    use HasFactory;
    protected $fillable = [
      'id', 'users_id', 'transactions_id', 'matakuliah_id', 'labs_id', 'name', 'nim', 'kelas', 'phone', 'pertemuan_ke', 'keperluan', 'status', 'kondisi', 'keterangan', 'tgl_peminjaman' 
     ];
     
     public function user(){
       return $this->belongsTo(User::class, 'users_id', 'id');
     }
     
     public function transaction(){
      return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
    
    public function labs(){
      return $this->belongsTo(Lab::class, 'labs_id','id' );
    }
    
    public function studies(){
      return $this->belongsTo(Study::class, 'matakuliah_id', 'id' );
    }
    
    
}
