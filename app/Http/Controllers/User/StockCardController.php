<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class StockCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reports = Report::where('office', session("department"))->get();
        return view('Employee.stockCard.index',[
            'reports' => $reports
        ]);
    }
}
