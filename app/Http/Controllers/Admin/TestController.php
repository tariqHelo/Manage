<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\ImageDetail;

use Illuminate\Http\Request;

class TestController extends Controller
{

     public function index(){

        return view('templats.index');
    }

    public function create(){

        return view('templats.templats_add');
    }

    
     public function makeimage(Request $request)  
    {
        
          $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
    
        $file = $request->file;
         $name = $file->getClientOriginalName();
         $newName = time().$name;
         $path = "storage/images/";
         $file->move($path , $newName);


        $ImageD = new ImageDetail;
        $ImageD->file = $request->file;
        $ImageD->title = $request->title;
        $ImageD->option1 = $request->option1;
        $ImageD->option2 = $request->option2;
        $ImageD->save();
        
         return view('templats.templats_add')->with('file',$file);
    } 

    // public function gallery(){
    //     $images = Image::latest()->get();
    //     return view('templats.templats_add' , compact('images'));
    // }
}
