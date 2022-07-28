<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
     'id', 'mahasiswa_id', 'loanitem_id', 'matakuliah_id', 'name', 'nim', 'kelas', 'phone', 'pertemuan_ke', 'keperluan', 'laboratorium', 'status'
    ];
    
    public function user(){
      return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function mahasiswa(){
      return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }
    
    public function studies(){
      return $this->belongsTo(Study::class, 'matakuliah_id', 'id' );
    }
    
    public function loanitem(){
      return $this->hasMany(LoanItem::class, 'id', 'loanitem_id' );
    }
    

      
}
