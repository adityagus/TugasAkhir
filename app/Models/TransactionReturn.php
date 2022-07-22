<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionReturn extends Model
{
    use HasFactory;
    protected $fillable = [
      'id', 'users_id', 'transactions_id', 'name', 'nim', 'kelas', 'phone', 'pertemuan_ke', 'keperluan', 'laboratorium', 'status', 'kondisi', 'keterangan' 
     ];
     
     public function user(){
       return $this->belongsTo(User::class, 'users_id', 'id');
     }
     
     public function transaction(){
      return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
}
