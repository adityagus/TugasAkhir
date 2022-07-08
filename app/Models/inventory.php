<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
      'id', 'category_id', 'labs_id', 'kd_brg', 'nama', 'deskripsi', 'slug', 'jumlah', 'satuan', 
    ];
    
    
    public function category_items(){
      return $this->belongsTo(CategoryItem::class, 'category_id', 'id');
    } 
    public function labs(){
      return $this->belongsTo(lab::class, 'labs_id', 'id' );
    }
    public function loan_items(){
      return $this->hasMany(LoanItem::class, 'id', 'inventory_id' );
    }
    
}
