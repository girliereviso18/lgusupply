<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Item;
use Validator;

class ItemsController extends Controller
{
 public function __construct()
	{
		$this->middleware('auth');
	}
    public function index() 
    {
    	$items = Item::with('category')->get();

        return view('items.index',[
            'items' => $items
        ]);

    }
    public function store(Request $request){
        $Itemsave=new Item();
        $Itemsave->items_name=$request->item_name;
        $Itemsave->barcode=$request->barcode;
        $Itemsave->category_name=$request->category_name;
        $Itemsave->description=$request->description;

        if($Itemsave->save()){
            return redirect()->route('items.index')->withErrors('Succesfully Added!');
        }
    }
     public function additem() 
    {
         return view('items.Additem.index',[
         
        ]);
     }
    public function edititems(Request $request){
        $item=Item::where('id',$request->id)->first();
        
        return view('items.Edit.index',[
            'item' => $item
        ]);
    } 
    public function updateitem(Request $request){
        $Editsave=Item::where('id',$request->id)->first();
        $Editsave->items_name=$request->item_name;
        $Editsave->barcode=$request->barcode;
        $Editsave->category_name=$request->category_name;
        $Editsave->description=$request->description;

        if($Editsave->update()){
            return redirect()->route('items.index')->withErrors('Updated!');
        }
    } 
    public function deleteitems(Request $request){
        $Deletesave=Item::where('id',$request->id)->first();       
        if($Deletesave->delete()){
            return redirect()->back()->withErrors('Delete!');
        }  

    // public function edititems() 
    // {
    //      return view('items.Edit.index',[
    //         // 'items' => $items
    //     ]);

    
        
    }
}