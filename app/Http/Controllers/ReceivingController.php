<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceivingController extends Controller
{
   public function __construct()
	{
		$this->middleware('auth');
	}
    public function index() 
    {
        return view('receiving.index',[
        	'page' => 'Receiving']);
   
    }
    public function manage() 
    {
        return view('Receiving.manage_rc.index');
    }
      
}
