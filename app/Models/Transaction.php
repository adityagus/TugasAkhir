<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
     'users_id', 'name', 'nim', 'kelas', 'phone', 'pertemuan_ke', 'keperluan', 'laboratorium', 'status'
    ];
    
    public function user(){
      return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
    public function loanitem(){
      return $this->hasMany(LoanItem::class, 'transaction_id', 'id');
    }
    
      
}
