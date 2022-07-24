<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
      'users_id', 'inventories_id', 'studies_id'
    ];
    
    public function inventory(){
      return $this->hasOne(Inventory::class, 'id', 'inventories_id');
    }
    public function user(){
      return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function studies(){
      return $this->belongsTo(study::class, 'studies_id', 'id');
    }

}
