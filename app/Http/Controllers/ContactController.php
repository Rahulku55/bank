<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $data = contact::all();
        return view('admin.contact.contact',compact('data'));
    }
    public function store(Request $request){
        $data = new contact();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->messege=$request->messege;
        $data->save();
        return redirect()->back()->with('message','message send succesfully');
    }

    public function delete($id){
        $user = contact::find($id);
        $user->delete();
            return redirect()->back()->with('message','delete succesfuly');
    }
}
