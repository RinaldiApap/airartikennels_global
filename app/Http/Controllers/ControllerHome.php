<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerHome extends Controller
{
    public function adm_ext_home()
    {
        // if (session('id_pic') == null) {
        //     Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
        //     return redirect('Logout');
        // } else {
        // }
        $jml_satwa = DB::table('t_satwa')
            ->select('*')
            ->count();
        $jml_ras = DB::table('r_ras')
            ->select('*')
            ->count();
        $jml_artikel = DB::table('t_artikel')
            ->select('*')
            ->count();
        // return ($jml_satwa);
        return view('adm_ext.home', compact('jml_satwa', 'jml_ras', 'jml_artikel'));
    }
}
