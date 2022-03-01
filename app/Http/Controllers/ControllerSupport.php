<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerSupport extends Controller
{
    public function data_satwa()
    {
        $response = DB::table('r_ras')
            ->select('*')
            ->get();

        return view('trah', compact('response'));
    }

    public function data_satwa_ras_jantan(Request $request)
    {
        $dt_jantan = DB::table('t_satwa')
            ->select('id_satwa', 'nama_satwa')
            ->where('id_ras', $request->id)
            ->where('jk', 1)
            ->get();
        // $dt_betina = DB::table('t_satwa')
        //     ->select('*')
        //     ->where('id_ras', $request->id)
        //     ->where('jk', 2)
        //     ->get();
        return response()->json($dt_jantan);
    }

    public function data_satwa_ras_betina(Request $request)
    {
        $dt_betina = DB::table('t_satwa')
            ->select('*')
            ->where('id_ras', $request->id)
            ->where('jk', 2)
            ->get();
        return response()->json($dt_betina);
    }

    public function data_satwa_by_id(Request $request)
    {
        $dt_satwa_id = DB::table('t_satwa')
        ->select('*')
            ->join('r_ras', 't_satwa.id_ras', '=', 'r_ras.id_ras')
            ->where('id_satwa', $request->id)
            ->get();
        // $dt_satwa_id = DB::select('SELECT *, timestampdiff(year, tgl_lhr, curdate()) as umur_thn, timestampdiff(month, tgl_lhr, curdate()) as umur_bln, timestampdiff(day, tgl_lhr, curdate()) as umur_hari 
        //                 FROM t_satwa 
        //                 INNER JOIN r_ras on t_satwa.id_ras = r_ras.id_ras
        //                 WHERE  id_satwa = ' . $request->id);
        return response()->json($dt_satwa_id);
    }
}