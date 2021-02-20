<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        return view('templats.templats_add');
    }

    
     public function makeimage()  
    {  
       $img = Image::make(public_path('images/hardik.jpg'));  
       $img->text('This is a example ', 120, 100);  
       $img->save(public_path('images/hardik3.jpg'));  
    } 
}
