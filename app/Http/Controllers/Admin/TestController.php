<?php

namespace App\Http\Controllers\Admin;
use App\Models\Group;

use App\Http\Controllers\Controller;
use Image;
use App\Models\Student;
use App\Models\ImageDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Tcpdf\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\FpdfTpl;
use setasign\FpdiProtection\FpdiProtection;
use setasign\Fpdi\PdfParser\StreamReader;
use DB;
// use PDF; // at the top of the file

class TestController extends Controller
{



     public function index(){
        $templates = ImageDetail::all();
        
        return view('templats.index')
        ->with('templates' , $templates);
    }
    public function create(){
        $ids = Student::select('group_id')->groupBy('group_id')->pluck('group_id')->all();
        $groups = Group::whereIn('id' , $ids)->get();
        $students = Student::get();

        $route = route('store_temp');
        return view('templats.templats_add')
        ->with('route' , $route)
        ->with('groups' , $groups)
        ->with('students' , $students);

    }
     public function makeimage(Request $request)  
    {
        $ids = Student::select('group_id')->groupBy('group_id')->pluck('group_id')->all();
        $groups = Group::whereIn('id' , $ids)->get();

        $route = route('print-image');
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'title'=> 'required',
            'option1'=> 'required',
        ]);
        $file = '/storage/'.Storage::disk('public')->put('files', request('file'));
        return view('templats.templats_add' , ['route' => $route , 'groups' => $groups , 'file' => $file]);

    } 
    public function printimage(Request $request){
        $path = request('file');
        $students = Student::get();
        $ids = Student::select('group_id')->groupBy('group_id')->pluck('group_id')->all();
        $groups = Group::whereIn('id' , $ids)->get();

       // dd($path);
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

        $style = array(
        'border' => 2,
        'vpadding' => 'auto',
        'hpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => array(255,255,255),
        'module_width' => 1, // width of a single module in points
        'module_height' => 1 // height of a single module in points
        );
    
      // dd(request('data'));
        if(request()->has("view")):

            foreach(request('data') as $i => $obj):
                $color = $obj['font_color'];
                list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
            //Set Parametatrs
                $title    =   $obj['settitle'];
                $write    =   $obj['wr'];
                // $write == '' ? $title : $write;
                $write = $title == '' ? $write : $title;
                $x        =   $obj['x'];
                $y        =   $obj['y'];
                $size     =   $obj['font_size'];
                $type     =   $obj['font_type'];
                // $certcode = $obj['certcode'];
                // if($certcode!=='none') {
                //     $pdf->write2DBarcode('https://survey.tareq.live', 'QRCODE,L', 170, 108, 16, 16, $style, 'N');
                //    // $pdf->Text(170, 124, 'QRCODE L');   
                // }
                $pdf->SetFont("$type",'B',$size);// Arial bold 15
                $pdf->SetTextColor($r , $g , $b);
                $pdf->SetXY($x, $y);
                $pdf->Write(0, $write);      


            endforeach;
            $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
            $pdf->Output( public_path($file_path) , 'F');

            $route = route('print-image');
            $file = '/'.$file_path;
            $old_file = $path;
            if(request()->has('path')):
                Storage::delete(request('path'));
            endif;
            return view('templats.templats_add' , ['route' => $route , 'data' => request('data')])->with("file" ,
            $path)->with("path" , $file) ->with('students' , $students)->with('groups' , $groups);
        else:            ///Save in Path Public

            if(isset($request->option1) && is_array($request->option1) ):
                $groupStudents = Student::whereIn('group_id' , $request->option1)->get();
                $gg = Group::find($request->option1);
                // dd($groupStudents);
                foreach($groupStudents as $index => $s):
                    $fileName = $s->name .'('.$gg[0]->title.')';
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

                    $style = array(
                    'border' => 2,
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => array(0,0,0),
                    'bgcolor' => array(255,255,255),
                    'module_width' => 1, // width of a single module in points
                    'module_height' => 1 // height of a single module in points
                    );

                    foreach(request('data') as $i => $obj):
                        $color = $obj['font_color'];
                        list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
                        //Set Parametatrs
                        $write = $obj['wr'];
                        $title = $obj['settitle'] == '' ? $write  : $s->{$obj['settitle']};
                        // $title = $s->{$obj['settitle']};
                        // $write = $write == null ? $title : $write;
                        $write = $title;
                        $x = $obj['x'];
                        $y = $obj['y'];
                        $size = $obj['font_size'];
                        $type = $obj['font_type'];
                        // $certcode = $obj['certcode'];
                        // if($certcode!=='none') {
                        // $pdf->write2DBarcode('https://survey.tareq.live', 'QRCODE,L', 170, 108, 16, 16, $style, 'N');
                        // // $pdf->Text(170, 124, 'QRCODE L');
                        // }
                        $pdf->SetFont("$type",'B',$size);// Arial bold 15
                        $pdf->SetTextColor($r , $g , $b);
                        $pdf->SetXY($x, $y);
                        $pdf->Write(0, $write);
    
    
                    endforeach;
                    $file_path = 'storage/pdf/pdf_'.strtotime('now').$index.'.pdf';
                    $pdf->Output( public_path($file_path) , 'F');
    
                    // foreach($request->option1 as $option):
                        $ImageD = new ImageDetail;
                        if(isset($path)):
                            Storage::delete($path);
                            $ImageD->file = $file_path;
                        else:
                            $ImageD->file = $file_path;
                        endif;
                        $ImageD->title = $fileName;
                        $ImageD->option1 = $s->group;
                        $ImageD->student_id = $s->id;
                        $ImageD->save();
                    // endforeach;

                endforeach;

            else:
                    $ImageD = new ImageDetail;
                    if(isset($path)):
                    Storage::delete($path);
                    $ImageD->file = $file_path;
                else:
                     $ImageD->file = $file_path;
                endif;
                    $ImageD->title = $request->title;
                    $ImageD->option1 = $request->option1;
                    $ImageD->save();
            endif;
            
            $path = str_replace('/storage/' , '' , $path);
             Storage::delete($path);
            \Session::flash("msg","تم حفظ الملف بنجاح");
            return redirect()->route('temp-create');  

        endif;
    }
    public function edit(Request $request , $id)
    {  //$students = Student::get();
        $ids = Student::select('group_id')->groupBy('group_id')->pluck('group_id')->all();
        $groups = Group::whereIn('id' , $ids)->get();
         $details = ImageDetail::find($id);
        $image = ImageDetail::find($id);
        $route = route('update-print-image' , ['id' => $id]);

        $request->request->add(['title' => $image->title]);
        $request->request->add(['Option1' => $image->Option1]);
        $request->request->add(['Option2' => $image->Option2]);
        $file = '/'.$image->file;
        return view('templats.templats_add' ,['route' => $route , 'details' => $details , 'groups'  => $groups ])->with('file',$file);
    }



    public function updateprintimage(Request $request , $id){
    $path = request('file');
    $students = Student::get();
    $details = ImageDetail::find($id);
        $ids = Student::select('group_id')->groupBy('group_id')->pluck('group_id')->all();
        $groups = Group::whereIn('id' , $ids)->get();
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

    // $style = array(
    // 'border' => 2,
    // 'vpadding' => 'auto',
    // 'hpadding' => 'auto',
    // 'fgcolor' => array(0,0,0),
    // 'bgcolor' => array(255,255,255),
    // 'module_width' => 1, // width of a single module in points
    // 'module_height' => 1 // height of a single module in points
    // );

    // dd(request('data'));

            if(request()->has("view")):
            if(request("data") != null && count(request("data"))):
                foreach(request('data') as $i => $obj):
                    $color = $obj['font_color'];
                    list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
                    //Set Parametatrs
                    $title = $obj['settitle'];
                    $write = $obj['wr'];
                    // $write == '' ? $title : $write;
                    $write = $title == '' ? $write : $title;
                    $x = $obj['x'];
                    $y = $obj['y'];
                    $size = $obj['font_size'];
                    $type = $obj['font_type'];
                    // $certcode = $obj['certcode'];
                    // if($certcode!=='none') {
                    // $pdf->write2DBarcode('https://survey.tareq.live', 'QRCODE,L', 170, 108, 16, 16, $style, 'N');
                    // // $pdf->Text(170, 124, 'QRCODE L');
                    // }
                    $pdf->SetFont("$type",'B',$size);// Arial bold 15
                    $pdf->SetTextColor($r , $g , $b);
                    $pdf->SetXY($x, $y);
                    $pdf->Write(0, $write);
    
    
                endforeach;
            endif;
            $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
            $pdf->Output( public_path($file_path) , 'F');

            $route = route('update-print-image' , ['id' => $id]);
            $file = '/'.$file_path;
            $old_file = $path;
            if(request()->has('path')):
                Storage::delete(request('path'));
            endif;
            return view('templats.templats_add' , ['route' => $route , 'data' => request('data')])->with("file" ,
                $path)->with("path" , $file) ->with('students' , $students)->with('groups' , $groups);
        else: ///Save in Path Public


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

            $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => array(255,255,255),
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
            );

            $ImageD = ImageDetail::find($id);
            $s = \App\Models\Student::find($ImageD->student_id);

            if(request('data') != null):
                foreach(request('data') as $i => $obj):
                    $color = $obj['font_color'];
                    list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
                    //Set Parametatrs
                    $write = $obj['wr'];
                    $title = $obj['settitle'] == '' ? $write : $s->{$obj['settitle']};
                    // $title = $s->{$obj['settitle']};
                    // $write = $write == null ? $title : $write;
                    $write = $title;
                    $x = $obj['x'];
                    $y = $obj['y'];
                    $size = $obj['font_size'];
                    $type = $obj['font_type'];
                    // $certcode = $obj['certcode'];
                    // if($certcode!=='none') {
                    // $pdf->write2DBarcode('https://survey.tareq.live', 'QRCODE,L', 170, 108, 16, 16, $style, 'N');
                    // // $pdf->Text(170, 124, 'QRCODE L');
                    // }
                    $pdf->SetFont("$type",'B',$size);// Arial bold 15
                    $pdf->SetTextColor($r , $g , $b);
                    $pdf->SetXY($x, $y);
                    $pdf->Write(0, $write);
                    endforeach;
                    $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
                    $pdf->Output( public_path($file_path) , 'F');
    
                    // foreach($request->option1 as $option):
                    if(isset($path)):
                        Storage::delete($path);
                        $ImageD->file = $file_path;
                    else:
                        $ImageD->file = $file_path;
                    endif;
                    // $ImageD->title = $s->name.'_'.$s->group;
                    $ImageD->option1 = $s->group;
                    $ImageD->student_id = $s->id;
                    $ImageD->save();

                    $path = str_replace('/storage/' , '' , $path);
                    Storage::delete($path);
            endif;    
            \Session::flash("msg","تم حفظ الملف بنجاح");
            return redirect()->route('templates.index');

        endif;

        /*



    foreach(request('data') as $i => $obj):
    $color = $obj['font_color'];
    list($r , $g , $b) = sscanf($color , "#%02x%02x%02x");
    //Set Parametatrs
    $write = $obj['wr'];
    $x = $obj['x'];
    $y = $obj['y'];
    $size = $obj['font_size'];
    $type = $obj['font_type'];
    // $certcode = $obj['certcode'];
    // if($certcode!=='none') {
    // $pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', 170, 108, 16, 16, $style, 'N');
    // // $pdf->Text(170, 124, 'QRCODE L');
    // }
    $pdf->SetFont("$type",'B',$size);// Arial bold 15
    $pdf->SetTextColor($r , $g , $b);
    $pdf->SetXY($x, $y);
    $pdf->Write(0, $write);


    endforeach;
    $file_path = 'storage/pdf/pdf_'.strtotime('now').'.pdf';
    $pdf->Output( public_path($file_path) , 'F');

    if(request()->has("view")):
        $route = route('update-print-image' , ['id' => $id]);
        $file = '/'.$file_path;
        $old_file = $path;
    if(request()->has('path')):
        Storage::delete(request('path'));
    endif;
    return view('templats.templats_add' , ['route' => $route , 'details' => $details , 'groups' => $groups , 'data' => request('data')])->with("file" ,
    $path)->with("path" , $file)->with('students' , $students);
    else: ///Save in Path Public
    $ImageD = ImageDetail::find($id);
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
    \Session::flash("msg","تم حفظ الملف بنجاح");
    return redirect()->route('temp-create');

    endif;
    */
    }


     public function destroy($id)
    {
        
        ImageDetail::destroy($id);
        session()->flash("msg", "w: Template Deleted Successfully");
        return redirect(route("templates.index"));
    }

}
