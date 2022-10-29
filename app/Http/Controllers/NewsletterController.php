<?php

namespace App\Http\Controllers;

use App\Models\newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $data = newsletter::all();
        return view('admin.newsletter',compact('data'));
    }

    public function store(Request $request){
        $data = new newsletter();
        $data->email=$request->email;
        $data->save();
        return redirect()->back()->with("message",'message send succesfully');
    }

    public function delete($id){
        $user = newsletter::find($id);
        $user->delete();
        return redirect()->back()->with('message','delete succesfuly');
    }
}
