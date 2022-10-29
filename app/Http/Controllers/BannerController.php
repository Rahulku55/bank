<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
   public function banner(){
    $data = Banner::all();
    return view('admin.banner.banner',compact('data'));
   }

   public function store(Request $a){
    $this->validate($a,
    [
        'image' => 'required',
         ]);
    $file =$a->file('image');
     $filename = 'image'. time().'.'.$a->image->extension();
     $file->move("upload/banner/",$filename);
     $data = new Banner();
     $data->image=$filename;
     $data->save();
    //  echo $data;
    //  die;
     return redirect()->route('admin-banner')->with("message",'Add succesfully');
}

public function delete($id){
    $user = Banner::find($id);
    $destination="upload/banner/".$user->image;

     if(File::exists($destination)){

        File::delete($destination);
     }
    $user->delete();
        return redirect()->route('admin-banner')->with('messege','delete succesfuly');
}
}
