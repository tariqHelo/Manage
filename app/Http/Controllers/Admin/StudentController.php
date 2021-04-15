<?php

namespace App\Http\Controllers\Admin;
use App\Models\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ImageDetail;
use App\Http\Requests\Students\CreateRequest;
use Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use DB;
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
        $gr = Group::get();
        $files = ImageDetail::select("title")->groupBy("title")->get();
        $groups = \DB::table("students")->select("group_id")->groupBy("group_id")->get();
        return view('students.index')->with(compact('students', 'files', 'groups' , 'gr'));
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
        Student::create($request->all());
        Session::flash("msg", "Student created successfully");
        return redirect()->route('students');
    }

    public function receve(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'users' => 'required|array',
            'users.*' => 'required|integer',
        ]);
        if (request()->has('sms')) :


            $students = Student::whereIn('id', request('users'))->get();


            foreach ($students as $student) :
                $details = ImageDetail::where('student_id', $student->id)->where('option1', $student->group)->first();
                if ($details == null) :
                    continue;
                endif;
                $response = Http::get('https://www.hisms.ws/api.php', [
                    'username' => 'يزيد ناصر بن سراء',
                    'password' => 'Y1121111211y',
                    'numbers' => "$student->mobile",
                    'sender' => 'Yazed',
                    'message' => "http://127.1.1.1/download-file/" . $details->id,
                    'date' => '',
                    'time' => '',
                ]);
            endforeach;

            // dd($sms);
            Session::flash("msg", "Student Sending SMS  successfully");

        elseif (request()->has("Email")) :

            $students = Student::whereIn('id', request('users'))->get();


            foreach ($students as $student) :
                $details = ImageDetail::where('student_id', $student->id)->where('option1', $student->group)->first();
                if ($details == null) :
                    continue;
                endif;


                Mail::send('emails.welcome', [
                    'id' => $details->id
                ], function ($message) use ($student) {
                    $message->to($student->email)->subject('This is test e-mail');
                });
            endforeach;


            Session::flash("msg", "Student Sending E-mail successfully");
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
    public function update(Request $request ,$id )
    {  // dd($request->all());
        Student::find($id)->update($request->all());
        Session::flash("msg", "Student Updated successfully");
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

    public function search(Request $request)
    {
        if ($request->has("val")) :
            if ($request->val == 'all') :
                $students = DB::table("students")->get();
            else :
                $students = DB::table("students")->where("group", $request->val)->get();
            endif;
        else :
            $students = [];
        endif;

        return response()->json(['students' => $students]);
    }
}
