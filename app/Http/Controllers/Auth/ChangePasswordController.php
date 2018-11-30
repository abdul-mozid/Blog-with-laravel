<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class ChangePasswordController extends Controller {

    public function index() {
        return view('auth.passwords.change');
    }

    public function update(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hased_password = Auth::user()->password;
        if (Hash::check($request->old_password, $hased_password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Toastr::success('Password Changed Successfully.', 'Success');
            return redirect()->route('logout');
        }else{
            return redirect()->back();
        }
    }

}
