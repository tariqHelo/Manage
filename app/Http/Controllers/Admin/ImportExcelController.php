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
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ],
        [
            'select_file.required' => __('.'),
        ]);
        $file = $request->select_file;
        Excel::import(new ExcelImport ,$file);
        Session::flash("msg","File Excel Uploded successfully");
        return redirect()->back();
    }



    // insert
    public function importInsert(Request $request)
    {    
        dd(10);

        if($request->get('No'))
        {
            $codesExists = $request->get('No');
            $data = DB::table("students")->where('id', $codesExists)->count();
            if($data > 0)
            {
                return redirect()->back()->with('codesExists',"Exit already.!");
            }
            else
            {
                $importInsert = [
                    'No' 	=>	$request->No,
                    'Name' 	=>	$request->Name,
                    'Sex' 	=>	$request->Sex,
                    'Age' 	=>	$request->Age
                ];
                DB::table('students')->insert($importInsert);
                return redirect()->back()->with('importInsert','Insert Sucessful.!');
            }

        }
    }
    // update
	public function importUpdate(Request $request)
	{ dd(20);
		$importUpdate = [
            'id'    =>	$request->idUpdate,
            'No' 	=>	$request->No,
            'Name' 	=>	$request->Name,
            'Sex' 	=>	$request->Sex,
            'Age'   =>	$request->Age
        ];
		DB::table('students')->where('id',$request->idUpdate)->update($importUpdate);
		return redirect()->back()->with('importUpdate' ,'Update Successfull.!');
    }

    // delete
    public function importDelete($importID)
    { //dd(20);
		DB::table('students')->where('id',$importID)->delete();
		return redirect()->back()->with('importDelete','Delect Successfull.!');
	}
}
