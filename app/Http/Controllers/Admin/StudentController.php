<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ImageDetail;
use App\Http\Requests\Students\CreateRequest;
use Redirect;
use Illuminate\Support\Facades\Session;

use Http;
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
        $students = Student::orderBy('id', 'ASC')->get();
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
       // dd($request->all());
        if (!$request->status){
            $request['status']=0;
        }
        Student::create($request->all());
        Session::flash("msg","Student created successfully");
        return view('students.index');  
        
    }

    public function receve(Request $request)
    {
    //dd($request->all());
    
        $request->validate([
            'users' => 'required|array',
            'users.*' => 'required|integer',
           // 'file'    =>  'required|mimes:pdf|max:1024'
        ]);

    if(request()->has('sms')):
        $sms = Student::whereIn('id' , request('users'))->get()->pluck('mobile')->all();
       // dd($sms);
        $res = Http::withHeaders([
        'Content-Type'=> 'application/Json',
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2F1dGguc21zLnRvL29hdXRoL3Rva2VuIiwiaWF0IjoxNjE0MTk0MTY2LCJuYmYiOjE2MTQxOTQxNjYsImp0aSI6Ijc0RWdiSTk1b0doYWxmVlYiLCJzdWIiOjIxNjczNCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyIsImtpZCI6MTI1NDJ9.qeOEuKkJ6glOLapTl7Ok7iWIijt1K6wvLbyMcVQrc4w"
        ])->post('https://api.sms.to/sms/send',[
            "message"=> "http://127.1.1.1/download-file/".request('sm'),
            "to"=> $sms
        ]);
       Session::flash("msg","Student Sending SMS  successfully");
    elseif(request()->has("Email")):
        $emails = Student::whereIn('id' , request('users'))->get()->pluck('email')->all();
        //dd($emails);
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
    public function SMS(Request $request)
    {

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
