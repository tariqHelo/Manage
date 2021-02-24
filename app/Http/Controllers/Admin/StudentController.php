<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ImageDetail;

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
        $students = Student::get();
        $files = ImageDetail::get();
        return view('students.index')
        ->with('students',$students)
        ->with('files',$files);
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

    public function store(Request $request)
    {
       // dd($request->all());
        if (!$request->published){
            $request['status']=0;
        }
        Student::create($request->all());
        return view('students.index');  
        
    }

    public function receve(Request $request)
    {
        // $request->validate([
        //     'users' => 'required|array',
        //     'users.*' => 'required|integer',
        //     'file'    =>  'required|mimes:pdf|max:1024'
        // ]);
    $emails = Student::whereIn('id' , request('users'))->get()->pluck('email')->all();
    Mail::send('emails.welcome', [
        'id'    =>  request('sm')
    ], function($message) use ($emails)
    {    
        $message->to($emails)->subject('This is test e-mail');    
    });  
    return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
