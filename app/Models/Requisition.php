<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    // Define the relationship to Requisition Items
    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class);
    }
}