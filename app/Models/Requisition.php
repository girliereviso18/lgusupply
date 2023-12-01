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
    // Define the relationship to Requisition Items
    public function user()
    {
        return $this->belongsTo(User::class, 'requested_by','id');
    }
    public function office()
    {
        return $this->belongsTo(Department::class, 'office_id','id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id','id');
    }
    
    
}