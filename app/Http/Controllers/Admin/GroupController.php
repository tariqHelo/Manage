<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Student;

use Storage;

use App\Models\ImageDetail;



use Redirect;
use Illuminate\Support\Facades\Session;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //dd(20);
        $groups = Group::get();
        return view('group.index')->with('groups' , $groups);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
                'title' => 'required',
                ]);
          Group::create($request->all());
          Session::flash("msg", "Groups created successfully");
          return redirect()->route('groups.index');
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
        $request->validate([
        'title' => 'required',
        ]);
        Group::find($id)->update($request->all());
        Session::flash("msg", "Groups Updated successfully");
          return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //dd(20);
         $ids = Student::where('group_id' , $id)->pluck('id')->all();
         $files = ImageDetail::select('file')->whereIn('student_id' , $ids)->pluck('file')->all();

        //  Storage::delete($files);
        foreach($files as $file):
            $file = str_replace('storage/' , '' , $file);
            if(Storage::exists($file)):
                Storage::delete($file);
            endif;
        endforeach;

         $groups = Group::findOrFail($id)->delete();
         session()->flash("msg", "w: Group Deleted Successfully");
          return redirect()->route('groups.index');
    }
}
