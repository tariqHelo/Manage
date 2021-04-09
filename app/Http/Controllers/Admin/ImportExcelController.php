<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Students\CreateRequest;
use Illuminate\Http\Request;
use DB;
use App\Models\ExcelImport;
use App\User;
use Session;
use Hash;
use Auth;
use Image;
use Carbon\Carbon;
class ImportExcelController extends Controller
{
   public function index()
    {
        $data = DB::table('students')->orderBy('id', 'ASC')->get();
        
        //dd($data);
        $user = Auth::user();
        return view('students.create')
        ->with('data' , $data)
        ->with('user' , $user);
    }
     public function create()
     {
       //dd(20);
     }

   public function import(Request $request)
    {  //dd($request->all());
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ],
        [
            'select_file.required' => __('يرجي إدخال الملف '),
        ]);

        $file = $request->select_file;
       // $group =$request->group;
       try {
           Excel::import(new ExcelImport($request->group) ,$file);
           Session::flash("msg"," تم إضافة الملف بنجاح ");
       } catch (\Throwable $th) {
           Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
       }
        return redirect()->back();
    }
    // // insert
    // public function importInsert(Request $request)
    // {    
    // }
    // // update
	// public function importUpdate(Request $request)
	// { //dd(20);
	// 	$importUpdate = [
    //         'id'    =>	$request->idUpdate,
    //         'No' 	=>	$request->No,
    //         'Name' 	=>	$request->Name,
    //         'Sex' 	=>	$request->Sex,
    //         'Age'   =>	$request->Age
    //     ];
	// 	DB::table('students')->where('id',$request->idUpdate)->update($importUpdate);
	// 	return redirect()->back()->with('importUpdate' ,'Update Successfull.!');
    // }

    // // delete
    // public function importDelete($importID)
    // { //dd(20);
	// 	DB::table('students')->where('id',$importID)->delete();
	// 	return redirect()->back()->with('importDelete','Delect Successfull.!');
	// }
}