<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanItem extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
      'inventory_id', 'users_id', 'transactions_id'
    ];
    
    public function inventory(){
      return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }
}
