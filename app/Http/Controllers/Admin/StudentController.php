<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ImageDetail;
use App\Http\Requests\Students\CreateRequest;
use Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Mail;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $students = Student::orderBy('id', 'DESC')->get();
        $files = ImageDetail::get();
        return view('students.index')->with(compact('students', 'files'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateRequest $request)
    {
       //dd($request->all());
        // if (!$request->status){
        //     $request['status']=0;
        // }
        Student::create($request->all());
        Session::flash("msg","Student created successfully");
        return redirect()->route('students');  
        
    }

    public function receve(Request $request)
    {
          //  dd($request->all());
        
            $request->validate([
                'users' => 'required|array',
                'users.*' => 'required|integer',
            ]);
        if(request()->has('sms')):


            $sms = Student::whereIn('id' , request('users'))->get()->pluck('mobile')->all();
        // dd($sms);
            $response = Http::get('https://www.hisms.ws/api.php', [
            'username' => 'يزيد ناصر بن سراء',
            'password' => 'Y1121111211y',
            'numbers' => "$sms",
            'sender' => 'Yazed',
            'message' => "http://127.1.1.1/download-file/".request('sm'),
            'date' => '',
            'time' => '',
            ]);
        Session::flash("msg","Student Sending SMS  successfully");

        elseif(request()->has("Email")):

                $emails = Student::whereIn('id' , request('users'))->get()->pluck('email')->all();
            // dd($emails);
                Mail::send('emails.welcome', [
                    'id'    =>  request('sm')
                ], function($message) use ($emails)
                {    
                    $message->to($emails)->subject('This is test e-mail');    
                }); 
                Session::flash("msg","Student Sending E-mail successfully");
        endif;
        return redirect()->back();
    }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {  // dd($request->all());
        Student::find($id)->update($request->all());
        Session::flash("msg","Student Updated successfully");
        return redirect()->route('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $task = Student::findOrFail($id)->delete();
          session()->flash("msg", "w: Student Deleted Successfully");
        return redirect()->route('students');

    }
}
