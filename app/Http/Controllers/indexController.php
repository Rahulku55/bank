<?php

namespace App\Http\Controllers;

use App\Models\index;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        $data = index::all();
        return view('admin.index.index',compact('data'));
    }

    public function store(Request $request){
     $file =$request->file('logo');
     $filename = 'logo'. time().'.'.$request->logo->extension();
     $file->move("upload/logo/",$filename);
        $data = new index();
        $data->address = $request->address;
        $data->phone1 = $request->phone1;
        $data->phone2 = $request->phone2;
        $data->email = $request->email;
        $data->pin = $request->pin;
        $data->logo=$filename;
        $data->save();
        return redirect()->back()->with("message",'Add succesfully');
    }

    public function edit(Request $request, $id){
        $data = index::find($id);
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email1 = $request->email1;
        $data->email2 = $request->email2;
        $data->save();
        return redirect()->back()->with("message",'update succesfully');
    }

    public function delete($id){
        $data = index::find($id);
        $data->delete();
        return redirect()->back()->with("message",'delete succesfully');
    }
}
