<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    public function item()
    {
    	return $this->belongsTo('\App\Models\Item', 'item_id','id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }
     public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_of_measurement','id');
    }
}
