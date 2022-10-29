<?php

namespace App\Http\Controllers;

use App\Models\fighter;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    public function index(){
        $data = fighter::all();
        return view('admin.fighter.fighter',compact('data'));
    }

    public function store(Request $request){
        $file =$request->file('image');
        $filename = 'image'. time().'.'.$request->image->extension();
        $file->move("upload/fighter/",$filename);
        $data = new fighter();
        $data->title=$request->title;
        $data->image=$filename;
        $data->save();
        return redirect()->back()->with("message",'Add succesfully');
    }

    public function delete($id){
        $user = fighter::find($id);
        $destination="upload/fighter/".$user->image;

         if(File::exists($destination)){

            File::delete($destination);
         }
        $user->delete();
            return redirect()->back()->with('message','delete succesfuly');
    }
}
