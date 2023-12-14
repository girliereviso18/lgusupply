<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo('\App\Models\Item', 'item_id','id');
    }
     public function office()
    {
        return $this->belongsTo(Department::class, 'office_id','id');
    }
    
}