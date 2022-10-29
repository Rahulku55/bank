<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\blog;
use App\Models\fighter;
use App\Models\partner;
use App\Models\service;
use Illuminate\Http\Request;

class FrontendConroller extends Controller
{
    public function index(){
        $banner = Banner::latest()->limit(3)->get();
        $fighter = fighter::latest()->limit(6)->get();
        $partners = partner::latest()->limit(9)->get();
        $service = service::latest()->limit(9)->get();
        return view('frontend.index',compact('banner','fighter','partners','service'));
    }

    public function service(){
        $data = service::all();
        return view('frontend.service',compact('data'));
    }

    public function about(){
        return view('frontend.about');
    }
    public function blog(){
        $data = blog::all();
        return view('frontend.partition.blog',compact('data'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function login(){
        return view('frontend.login');
    }
}
