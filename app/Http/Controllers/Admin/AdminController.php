<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;

class AdminController extends Controller
{
      public function changePassword(){
        return view('change.change_password');
    }
    
    public function postChangePassword(ChangePasswordRequest $request){
        $hasher = app('hash');
        if ($hasher->check($request->current_password, auth()->user()->password)) {
            // Success
            $user = User::find(auth()->user()->id);
            $user->update(['password'=>bcrypt($request->new_password)]);
            session()->flash("msg", "s:Password updated Successfully");
            return redirect(route("change-password"));
        }
        else{
            session()->flash("msg", "e:Invalid Current Password");
            return redirect(route("change-password"));
        }
    }
}
