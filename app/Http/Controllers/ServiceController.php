<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(){
        $data = service::all();
        return view('admin.service.service',compact('data'));
    }
    public function store(Request $request){
        $file =$request->file('image');
        $filename = 'image'. time().'.'.$request->image->extension();
        $file->move("upload/service/",$filename);
        $data = new service();
        $data->title=$request->title;
        $data->subtitle=$request->subtitle;
        $data->description=$request->description;
        $data->image=$filename;
        $data->save();
        return redirect()->back()->with("message",'Add succesfully');
    }

    public function delete($id){
        $user = service::find($id);
        $destination="upload/service/".$user->image;

         if(File::exists($destination)){

            File::delete($destination);
         }
        $user->delete();
            return redirect()->route('admin-service')->with('message','delete succesfuly');
    }
}
