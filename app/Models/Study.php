<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;
    protected $fillable = [
      'matakuliah'
    ];
    
    protected function TransactionReturn(){
      $this->belongsTo(TransactionReturn::class, 'matakuliah_id', 'id');
    }

}
