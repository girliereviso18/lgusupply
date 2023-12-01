<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedRequisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'requisition_id',
        // Add other fields as needed
    ];

    // Add any relationships or additional methods here
}