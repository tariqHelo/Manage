<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\ImageDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\FpdfTpl;
use setasign\FpdiProtection\FpdiProtection;
use setasign\Fpdi\PdfParser\StreamReader;
class TestController extends Controller
{

     public function index(){
        $templates = ImageDetail::all();
        return view('templats.index')->with('templates' , $templates);
    }
    public function create(){
        $route = route('store_temp');
        return view('templats.templats_add' , ['route' => $route]);
    }
     public function makeimage(Request $request)  
    {  
        $route = route('print-image');

        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $file = '/storage/'.Storage::disk('public')->put('files', request('file'));
        return view('templats.templats_add' , ['route' => $route ])->with('file',$file);
    } 
    public function printimage(Request $request){

        $path = request('file');

       //Set Parametatrs
        $write = $request->wr;
        $x = $request->x;
        $y = $request->y;

        // initiate FPDI
        $pdf = new Fpdi('P', 'mm', 'A4', true, 'UTF-8', false);
        // add a page
        $pdf->AddPage();
        // set the source file
        $fileContent = file_get_contents(asset($path),'rb');
        $pagecount = $pdf->setSourceFile( StreamReader::createByString($fileContent) );
        // import page 1
        $tplId = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplId, 10, 10, 200);
        // now write some text above the imported page
        $pdf->SetFont('Arial','B',15);// Arial bold 15
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY($x, $y);
        $pdf->Write(0, $write);       
        $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
        $pdf->Output($file_path, 'F');

        if(request()->has("view")):
            $route = route('print-image');
            $file = '/'.$file_path;
            $old_file = $path;
            if(request()->has('path')):
                Storage::delete(request('path'));
            endif;
            return view('templats.templats_add' , ['route' => $route , 'x' => $x , 'y' => $y , 'write' => $write ])->with("file" , $path)->with("path" , $file);     
        else:            ///Save in Path Public
            $ImageD = new ImageDetail;
            if(isset($path)):
                Storage::delete($path);
                $ImageD->file = $file_path;
            else:
                $ImageD->file = $file_path;
            endif;
            $ImageD->title = $request->title;
            $ImageD->option1 = $request->option1;
            $ImageD->option2 = $request->option2;
            $ImageD->save();
            
            

            $path = str_replace('/storage/' , '' , $path);
            Storage::delete($path);

            return redirect()->route('temp-create');  

        endif;
    }
}

