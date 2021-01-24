<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'uuid' , 'products_id', 'qty', 'tanggal' 
     ];
 
     public function product()
     {
         return $this->belongsTo(Product::class, 'products_id', 'id');
     }
}
