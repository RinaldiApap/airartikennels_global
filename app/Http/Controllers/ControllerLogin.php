<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ControllerLogin extends Controller
{
    public function Login(Request $request)
    {
        $pass = md5($request->password);
        $password_c = md5($request->email) . $pass;
        $password = md5($password_c);

        // return $password;
        // return $request->all();
        return view('adm_ext.home');
    }
}
