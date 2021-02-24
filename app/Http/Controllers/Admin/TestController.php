<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\ImageDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;
class TestController extends Controller
{

     public function index(){

        return view('templats.index');
    }

    public function create(){
        
        return view('templats.templats_add');
    }

    
    //  public function makeimage(Request $request)  
    // {
    //     if(request()->has('finishFile')):
    //         // your code 
    //     else:
    //         $request->validate([
    //           'file' => 'required|mimes:pdf,xlx,csv|max:2048',
    //       ]);
      
    //       // $file = $request->file;
    //       //  $name = $file->getClientOriginalName();
    //       //  $newName = time().$name;
    //       //  $path = "storage/images/";
    //       //  $file->move($path , $newName);
  
    //       // $file = '/storage/'.request('file')->store('data');
    //       $file = '/storage/'.Storage::disk('public')->put('files', request('file'));
    //       // $ImageD = new ImageDetail;
    //       // $ImageD->file = $file;
    //       // $ImageD->title = $request->title;
    //       // $ImageD->option1 = $request->option1;
    //       // $ImageD->option2 = $request->option2;
    //       // $ImageD->save();
          
    //        return view('templats.templats_add')->with('file',$file);
    //     endif;
    // } 
      public function makeimage1(Request $request)
    {
     $file = '/storage/'.request('file')->store('data');
        //$file->save('image.png'); 
        dd($file);
    }

    public function makeimage2(Request $request)  
    {     
          $img = '/storage/'.request('file')->store('data');
          //dd($img);
          $img->text('Hello coderMen', 120, 100, function($font) {  
          //$font->file(public_path('path/font.ttf'));  
          $font->size(28);  
          $font->color('#4285F4');  
          $font->align('center');  
          $font->valign('bottom');  
          $font->angle(0);  
      });  
       $img->save(public_path('images/text_with_image.jpg'));  
    }

    public function makeimage(){
        // include(app_path() . '\functions\prices.php');
        // dd(app_path());
        // Create new Landscape PDF
        $pdf = new FPDI('l');
        // Reference the PDF you want to use (use relative path)
        // $pagecount = $pdf->setSourceFile( asset('pdf/a.pdf') );
        $fileContent = file_get_contents(asset('pdf/a.pdf'),'rb');
        $pagecount = $pdf->setSourceFile( StreamReader::createByString($fileContent) );

        // Import the first page from the PDF and add to dynamic PDF
        $tpl = $pdf->importPage(1);
        $pdf->AddPage();

        // Use the imported page as the template
        $pdf->useTemplate($tpl);

        // Set the default font to use
        $pdf->SetFont('Helvetica');

        // adding a Cell using:
        // $pdf->Cell( $width, $height, $text, $border, $fill, $align);

        // First box - the user's Name
        $pdf->SetFontSize('30'); // set font size
        $pdf->SetXY(10, 89); // set the position of the box
        $pdf->Cell(0, 10, 'Niraj Shah', 1, 0, 'C'); // add the text, align to Center of cell

        // add the reason for certificate
        // note the reduction in font and different box position
        $pdf->SetFontSize('20');
        $pdf->SetXY(80, 105);
        $pdf->Cell(150, 10, 'creating an awesome tutorial', 1, 0, 'C');

        // the day
        $pdf->SetFontSize('20');
        $pdf->SetXY(118,122);
        $pdf->Cell(20, 10, date('d'), 1, 0, 'C');

        // the month
        $pdf->SetXY(160,122);
        $pdf->Cell(30, 10, date('M'), 1, 0, 'C');

        // the year, aligned to Left
        $pdf->SetXY(200,122);
        $pdf->Cell(20, 10, date('y'), 1, 0, 'L');

        // render PDF to browser
        $pdf->Output();
    }
}
