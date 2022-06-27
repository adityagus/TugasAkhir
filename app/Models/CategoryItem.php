<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'inventory_id', 'namakategori'
    ];
    
    public function Inventory(){
      return $this->hasMany(Inventory::class, 'inventory_id', 'id' );
    }
    
    
}
