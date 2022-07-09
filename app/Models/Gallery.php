<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
      'inventories_id', 'image'
    ];
    
    public function inventory(){
      return $this->belongsTo(Inventory::class, 'inventories_id', 'id' );
    }
    
}
