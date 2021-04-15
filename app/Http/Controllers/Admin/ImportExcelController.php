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
            'select_file'  => 'required|mimes:xls,xlsx',
            'group' => 'required'

        ],
        [
            'select_file.required' => __('يرجي إدخال الملف '),
            'group.required' => __('يرجي إدخال المجموعة '),

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
}
