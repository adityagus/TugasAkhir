<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'inventory_id', 'transactions_id', 'total'
    ];
    
    public function inventory(){
      return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }
    
    public function transaction(){
      return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
    
    public function study(){
      return $this->belongsTo(Study::class, 'studies_id', 'id');
    }
    
   
}
