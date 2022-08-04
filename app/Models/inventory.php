<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
      'id', 'category_id', 'studyprogram_id', 'kd_brg', 'nama', 'deskripsi', 'slug', 'jumlah', 'satuan', 'inventories_id'
    ];
    
    public function category_items(){
      return $this->belongsTo(CategoryItem::class, 'category_id', 'id');
    } 
    public function studyprograms(){
      return $this->belongsTo(StudyProgram::class, 'studyprogram_id', 'id' );
    }
    public function loan_items(){
      return $this->hasMany(LoanItem::class, 'id', 'inventory_id' );
    }
    
    
    public function galleries(){
      return $this->hasMany(Gallery::class, 'inventories_id', 'id');
    }
}
