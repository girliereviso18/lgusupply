<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\Division;
use Illuminate\Support\Fascade\url;


class DivisionsController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() 
     {
        $divisions = Division::get();

        return view('Division.index',[
            'divisions' => $divisions
        ]);

    }
    public function store(Request $request)
    {
        $Divisionsave = new Division();
        $Divisionsave->division_name = $request->division_name;

        $Divisionsave->description = $request->description;

        if ($Divisionsave->save()) {
            return redirect()->route('admin.divisions.index')->withErrors('Successfully added!');
        }

        } 
    public function adddivisions() 
    {
        return view('divisions.store.index',[
           
        ]);
    }
       public function editdivisions(Request $request)
{
    $division = Division::where('id', $request->id)->first();
    
    return view('Division.Edit.index', [
        'division' => $division // Corrected variable name
    ]);
}

        public function updatedivisions(Request $request){
        $Editsave=Division::where('id',$request->id)->first();
        $Editsave->division_name = $request->division_name;
        $Editsave->description= $request->description;
       
        if($Editsave->update()){
            return redirect()->route('admin.divisions.index')->withErrors('Updated!');
        }
    } 
    public function deletedivisions(Request $request){
        $Deletesave=Division::where('id',$request->id)->first();       
        if($Deletesave->delete()){
            return redirect()->back()->withErrors('Delete!');
        }  

    }
   
     public function viewdivisions(Request $request)
    {
        $division = Division::where('id', $request->id)->first();
            
        return view('Division.view', [
            'division' => $division
        ]);
    }

}
