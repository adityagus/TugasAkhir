<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
      'nama_mhs', 'nim', 'image'
    ];
    
    public function scopeFilter($query, array $filters)
    {
      $query->when($filters['search'] ?? false, function ($query, $search) {
        return $query->where(function($query) use ($search){
          $query->where('nama_mhs',  'like', '%' . $search . '%')
                ->orWhere('nim', 'like', '%' . $search . '%');
        });  
      });
    }
}