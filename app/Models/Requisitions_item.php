<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitions_item extends Model
{
    use HasFactory;
public function requisitions_item()
    {
        return $this->belongsTo('\App\Models\Requisitions_item', 'item_id','id');
    }
}