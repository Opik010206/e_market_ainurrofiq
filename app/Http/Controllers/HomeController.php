<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.home');
    }
    public function profile(){
        return view('dashboard.profile');
    }
    public function contact(){
        return view('dashboard.contact');
    }
}
