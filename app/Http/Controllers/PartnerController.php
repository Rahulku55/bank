<?php

namespace App\Http\Controllers;

use App\Models\partner;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $data = partner::all();
        return view('admin.partners.partners',compact('data'));
    }

    public function store(Request $request){
        $file =$request->file('image');
        $filename = 'image'. time().'.'.$request->image->extension();
        $file->move("upload/partners/",$filename);
        $data = new partner();
        $data->title=$request->title;
        $data->image=$filename;
        $data->save();
        return redirect()->back()->with("message",'Add succesfully');
    }

    public function delete($id){
        $user = partner::find($id);
        $destination="upload/partners/".$user->image;

         if(File::exists($destination)){

            File::delete($destination);
         }
        $user->delete();
            return redirect()->back()->with('message','delete succesfuly');
    }


}
