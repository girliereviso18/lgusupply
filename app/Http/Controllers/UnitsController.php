<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\Unit;
use Illuminate\Support\Fascade\url;


class UnitsController extends Controller
{
  public function __construct()
	{
		$this->middleware('auth');
	}
    public function index() 
     {
    	$units = Unit::get();

        return view('Units.index',[
            'units' => $units
        ]);

    }
    public function store(Request $request){
        $Unitsave=new Unit();
        $Unitsave->unit_name = $request->unit_name;
  
        if($Unitsave->save()){
            return redirect()->route('units.index')->withErrors('Sucessfully added!');
        }
        } 
    public function addunits() 
    {
        return view('units.store.index',[
           
        ]);
    }
     public function editunits(Request $request){
        $unit= Unit::where('id',$request->id)->first();
        
        return view('Units.Edit.index',[
            'unit' => $unit
        ]);
    } 
    public function updateunits(Request $request){
        $Editsave=Unit::where('id',$request->id)->first();
        $Editsave->unit_name = $request->unit_name;
       
        if($Editsave->update()){
            return redirect()->route('units.index')->withErrors('Updated!');
        }
    } 
    public function deleteunits(Request $request){
        $Deletesave=Unit::where('id',$request->id)->first();       
        if($Deletesave->delete()){
            return redirect()->back()->withErrors('Delete!');
        }  

    }
}
