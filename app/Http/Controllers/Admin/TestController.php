<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\ImageDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Tcpdf\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\FpdfTpl;
use setasign\FpdiProtection\FpdiProtection;
use setasign\Fpdi\PdfParser\StreamReader;

// use PDF; // at the top of the file

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
            'title'=> 'required',
            //'title'=> 'required',

        ]);
        $file = '/storage/'.Storage::disk('public')->put('files', request('file'));
        return view('templats.templats_add' , ['route' => $route ])->with('file',$file);
    } 
    public function printimage(Request $request){
        $path = request('file');
        // initiate FPDI
        $pdf = new Fpdi();
        // add a page
        $pdf->AddPage();
        $pdf->SetMargins(0,0,0);
        // set the source file
        $fileContent = file_get_contents(asset($path),'rb');
        $pagecount = $pdf->setSourceFile( StreamReader::createByString($fileContent) );
        // import page 1
        $tplId = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplId, 0, 0, 200 , 150 , true);

    
    //   dd(request('data'));
        foreach(request('data') as $i => $obj):
            $color = $obj['font_color'];
            list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
           //Set Parametatrs
            $write =   $obj['wr'];
            $x     =   $obj['x'];
            $y     =   $obj['y'];
            $size  =   $obj['font_size'];
            $type  =   $obj['font_type'];
          //  dd($type);
            $pdf->SetFont("$type",'B',$size);// Arial bold 15
            $pdf->SetTextColor($r , $g , $b);
            $pdf->SetXY($x, $y);
            $pdf->Write(0, $write);      


        endforeach;
        $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
        $pdf->Output( public_path($file_path) , 'F');

        if(request()->has("view")):
            $route = route('print-image');
            $file = '/'.$file_path;
            $old_file = $path;
            if(request()->has('path')):
                Storage::delete(request('path'));
            endif;
            return view('templats.templats_add' , ['route' => $route , 'data' => request('data')])->with("file" , $path)->with("path" , $file);     
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
            \Session::flash("msg","Templates Add successfully");

        endif;
    }
    public function edit($id)
    {
        dd($id);

    }
     public function destroy($id)
    {
        ImageDetail::destroy($id);
        session()->flash("msg", "w: Template Deleted Successfully");
        return redirect(route("templates.index"));
    }



      public function MultiRow($left, $right) {
          
        $page_start = $this->getPage();
        $y_start = $this->GetY();
        // write the left cell
        $this->MultiCell(40, 0, $left, 1, 'R', 1, 2, '', '', true, 0);

        $page_end_1 = $this->getPage();
        $y_end_1 = $this->GetY();

        $this->setPage($page_start);

        // write the right cell
        $this->MultiCell(0, 0, $right, 1, 'J', 0, 1, $this->GetX() ,$y_start, true, 0);

        $page_end_2 = $this->getPage();
        $y_end_2 = $this->GetY();

        // set the new row position by case
        if (max($page_end_1,$page_end_2) == $page_start) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 == $page_end_2) {
            $ynew = max($y_end_1, $y_end_2);
        } elseif ($page_end_1 > $page_end_2) {
            $ynew = $y_end_1;
        } else {
            $ynew = $y_end_2;
        }
        $this->setPage(max($page_end_1,$page_end_2));
        $this->SetXY($this->GetX(),$ynew);
    }
}
