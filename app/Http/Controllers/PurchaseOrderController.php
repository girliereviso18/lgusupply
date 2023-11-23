<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index() 
    {
        return view('PurchaseOrder.index',[
        	'page' => 'PurchaseOrder'
        ]);
    }
    public function manage() 
    {
        return view('PurchaseOrder.manage.index');
    }
     public function view() 
    {
        return view('PurchaseOrder.view.index');
    }
}
