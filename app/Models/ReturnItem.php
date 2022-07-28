<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'inventory_id', 'users_id', 'transactionreturn_id', 'total'
    ];
    
    public function inventory(){
      return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }
    
    public function transactionreturn(){
      return $this->hasOne(TransactionReturn::class, 'id', 'transactionreturn_id');
    }
    
    public function study(){
      return $this->belongsTo(Study::class, 'studies_id', 'id');
    }
}
