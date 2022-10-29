<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $data = blog::all();
        return view('admin.blog.blog',compact('data'));
    }

    public function store(Request $request){
        $file =$request->file('image');
        $filename = 'image'. time().'.'.$request->image->extension();
        $file->move("upload/blog/",$filename);
        $data = new blog();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->image=$filename;
        $data->save();
        return redirect()->back()->with("message",'Add succesfully');
    }

    public function delete($id){
        $user = blog::find($id);
        $destination="upload/blog/".$user->image;

         if(File::exists($destination)){

            File::delete($destination);
         }
        $user->delete();
            return redirect()->route('admin-blog')->with('message','delete succesfuly');
    }
}
