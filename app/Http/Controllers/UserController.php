<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $a){
        if($a->isMethod('post')){
            $data = $a->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                if(auth()->user()->email =='superadmin@gmail.com'){
                    return redirect()->route('admin-index')->with('message','Login successfully :)');
                }
                else{
                    return redirect('/')->with('message','Login successfully :)');
                }
        }
        else{
            return redirect()->back()->with('message','enter correct email or password successfully :)');
        }
     }
    }

    public function store(Request $r){
        $data = new User();
        $data->name=$r->name;
        $data->email=$r->email;
        $data->password=Hash::make($r->password);
        $data->save();
        return redirect()->back()->with('message','user add successfully :)');
    }
    public function index(){
        $data = User::all();
        return view('admin.user.user',compact('data'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
            return redirect()->back()->with('message','delete succesfuly');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
