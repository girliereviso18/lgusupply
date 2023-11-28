<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();

        return view('Users.index', [
            'users' => $users
        ]);
    }
    public function store(Request $request)
    {
        $userSave = new User(); // Corrected the model name from Supplier to User
        $userSave->name = $request->name;
        $userSave->department_id = $request->department_id;
        $userSave->email = $request->email;
        $userSave->username = $request->username;
        $userSave->email_verified_at= $request->email_verified_at;
        $userSave->password= Hash::make($request->password);
        $userSave->role= 2;
        if ($userSave->save()) {
            return redirect()->route('admin.users.index')->with('success', 'Successfully added!');
        }
    }
    public function editusers(Request $request)
    {
        $user = User::find($request->id);

        return view('Users.Edit.index', [
            'user' => $user
        ]);
    }

   public function updateusers(Request $request){
      // return json_encode($request->all());
        $Editsave=User::where('id',$request->id)->first();
        $Editsave->name = $request->name;
        $Editsave->department_id = $request->department_id;
        $Editsave->email = $request->email;
        $Editsave->username = $request->username;
        $Editsave->email_verified_at = $request->email_verified_at;
        $Editsave->password= Hash::make($request->password);
        $Editsave->role = 2;
        if($Editsave->update()){
            return redirect()->route('admin.users.index')->withErrors('Updated!');
        }
    } 
    public function deleteusers(Request $request){
        $Deletesave=User::where('id',$request->id)->first();       
        if($Deletesave->delete()){
            return redirect()->back()->withErrors('Delete!');
        }  

    }
}