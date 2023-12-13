<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supply;
use Illuminate\Support\Fascade\url;
use Validator;

class StocksController extends Controller
{
 public function construct()
	{
		$this->middleware('auth');
	}
    public function index() 
    {
    	$supplies = Supply::with('item')->get();

        return view('Stocks.index',[
            'supplies' => $supplies
        ]);

    }
    public function store(Request $request){
        
        $Supplysave = new Supply();
        $Supplysave->stock_number = $request->stock_number;
        $Supplysave->item_id = $request->item_id;
        $Supplysave->qty = $request->qty;
        $Supplysave->unit_of_measurement= $request->unit_of_measurement;
        $Supplysave->supplier_id = $request->suppliers_name;
        $Supplysave->price_per_unit = $request->price_per_unit;
        $Supplysave->date_of_purchase = $request->date_of_purchase;
        $Supplysave->expiration_date = $request->expiration_date;
        $Supplysave->status = $request->status;
     
        if($Supplysave->save()){
        return redirect()->route('admin.stocks.index')->withErrors('Succesfully Added!');
        }
    }
    public function addstocks() 
    {
        return view('Stocks.Store.index',[
            // 'stocks' => $stocks
        ]);
    }
     public function editstocks(Request $request)
    {
        $stock = Supply::where('id', $request->id)->first();

        return view('Stocks.Edit.index', ['stock' => $stock]);
    }

    public function updatestocks(Request $request)
    {
        // return json_encode($request->all());
        $Editsave = Supply::where('id', $request->id)->first();
        $Editsave->item_id = $request->item_id;
        $Editsave->qty = $request->qty;
        $Editsave->unit_of_measurement = $request->unit;
        $Editsave->supplier_id = $request->suppliers_name;
        $Editsave->price_per_unit = $request->price_per_unit;
        $Editsave->date_of_purchase = $request->date_received;
        $Editsave->expiration_date = $request->expiration_date;
        $Editsave->status = $request->status;

        if ($Editsave->save()) {
            return redirect()->route('admin.stocks.index')->withErrors('Updated!');
        }
    
    } 
    public function deletestocks(Request $request){
        $Deletesave=Supply::where('id',$request->id)->first();       
        if($Deletesave->delete()){
            return redirect()->back()->withErrors('Delete!');
        }  

    }
    public function getStock(Request $request){
        $stocks=Supply::where('item_id',$request->id)->first();       
        return views('Requisition/Store.index',['stock' => $stocks]);
    }
}
