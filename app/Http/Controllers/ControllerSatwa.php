<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class ControllerSatwa extends Controller
{

   // SATWA
   public function show_satwa()
   {
      // if (session('id_pic') == null) {
      //    Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //    return redirect('Logout');
      // } else {
      // }
      $ras = DB::table('r_ras')->get();
      $satwa = DB::table('t_satwa')
         ->join('r_ras', 't_satwa.ras', '=', 'r_ras.id_ras')
         ->get();
      // $satwa = DB::select('SELECT *, timestampdiff(year, tgl_lahir, curdate()) as umur_thn, timestampdiff(month, tgl_lahir, curdate()) as umur_bln, timestampdiff(day, tgl_lahir, curdate()) as umur_hari, t_satwa.update_by as update_oleh, t_satwa.update_at as update_pada FROM t_satwa INNER JOIN r_ras on t_satwa.ras = r_ras.id_ras');

      return view('adm_ext.data_satwa', compact('ras', 'satwa'));
   }
   public function add_satwa(Request $request)
   {
      // if (session('id_pic') == null) {
      //    Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //    return redirect('Logout');
      // } else {
      // }
      // return $request->all();

      $validator = Validator::make($request->all(), [
         'foto_satwa' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040',
      ]);


      $file = $request->file('foto_satwa');

      if ($validator->fails()) {
         Alert::error('Gagal!', 'Periksa kembali jenis dan ukuran file, dan pastikan data sudah terisi semua!');
         return redirect('adm_ext_data_satwa');
      } else {
         if ($file == null) {
            $path_mtools = '';
         } else {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'foto_satwa/';
            $file->move($tujuan_upload, $nama_file);
            // return $size;
            $path_mtools = $tujuan_upload . $nama_file;
         }

         $update_at = new Controller;

         $save = DB::table('t_satwa')->insert([

            'nama_satwa' => $request->nama_satwa,
            'tgl_lahir' => $request->tgl_lhr,
            'ras' => $request->ras,
            'jk' => $request->jk,
            'tinggi' => $request->tinggi,
            'bb' => $request->bb,
            'panjang' => $request->panjang,
            'status' => '9',
            'stambum' => $request->stambum,
            'vaccine' => $request->vaccine,
            'update_by' => '1',
            'update_at' => $update_at->update_at(),
            'foto_satwa' => $path_mtools,

         ]);
         Alert::success('Success!', 'Data Berhasil Ditambahkan.');
         return redirect('/adm_ext_data_satwa');
      }
   }
   public function edit_satwa($id, Request $request)
   {
      // if (session('id_pic') == null) {
      //    Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //    return redirect('Logout');
      // } else {
      // }
      // return $request->all();

      $file = $request->file('foto_satwa_up');


      if ($file == null) {
         $update_at = new Controller;

         $save = DB::table('t_satwa')
            ->where('id_satwa', $id)
            ->update([
               'nama_satwa' => $request->nama_satwa,
               'tgl_lahir' => $request->tgl_lhr,
               'ras' => $request->ras,
               'jk' => $request->jk,
               'tinggi' => $request->tinggi,
               'bb' => $request->bb,
               'panjang' => $request->panjang,
               'status' => $request->status,
               'stambum' => $request->stambum,
               'vaccine' => $request->vaccine,
               'update_by' => '1',
               'update_at' => $update_at->update_at(),
            ]);
      } else {
         $nama_file = time() . "_" . $file->getClientOriginalName();
         $tujuan_upload = 'foto_satwa/';
         $file->move($tujuan_upload, $nama_file);
         // return $size;
         $path_mtools = $tujuan_upload . $nama_file;
         $update_at = new Controller;

         $save = DB::table('t_satwa')
            ->where('id_satwa', $id)
            ->update([
               'nama_satwa' => $request->nama_satwa,
               'tgl_lahir' => $request->tgl_lhr,
               'ras' => $request->ras,
               'jk' => $request->jk,
               'tinggi' => $request->tinggi,
               'bb' => $request->bb,
               'panjang' => $request->panjang,
               'status' => $request->status,
               'stambum' => $request->stambum,
               'vaccine' => $request->vaccine,
               'update_by' => '1',
               'update_at' => $update_at->update_at(),
               'foto_satwa' => $path_mtools,

            ]);
      }
      Alert::success('Success!', 'Data Berhasil Diupdate.');
      return redirect('/adm_ext_data_satwa');
   }


   // RAs
   public function data_ras()
   {
      // if (session('id_pic') == null) {
      //     Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //     return redirect('Logout');
      // } else {
      // }
      $response = DB::table('r_ras')->get();
      return view('adm_ext.data_ras', compact('response'));
   }
   public function add_ras(Request $request)
   {
      //   if (session('id_pic') == null) {
      //       Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //       return redirect('Logout');
      //   } else {
      //   }

      // return $request->all();
      $update_at = new Controller;

      $save = DB::table('r_ras')->insert([
         'nama_ras' => $request->nama_ras,
         'status_ras' => '9',
         'update_by' => "1",
         'update_at' => $update_at->update_at(),
      ]);
      return redirect('/data_ras');
   }
   public function edit_ras($id, Request $request)
   {
      //   if (session('id_pic') == null) {
      //       Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //       return redirect('Logout');
      //   } else {
      //   }

      // return $request->all();
      $update_at = new Controller;

      $save = DB::table('r_ras')
         ->where('id_ras', $id)
         ->update([
            'nama_ras' => $request->nama_ras,
            'status_ras' => $request->status,
            'update_by' => "1",
            'update_at' => $update_at->update_at(),
         ]);
      return redirect('/data_ras');
   }
   public function hapus_ras($id)
   {
      //   if (session('id_pic') == null) {
      //       Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //       return redirect('Logout');
      //   } else {
      //   }

      // return $request->all();
      $update_at = new Controller;

      $save = DB::table('r_ras')
         ->where('id_ras', $id)
         ->delete();
      return redirect('/data_ras');
   }
   public function data_award($id, $nama_satwa)
   {
      // if (session('id_pic') == null) {
      //    Alert::error('Oops!', 'Sesi Telah Berakhir, Silahkan Login Kembali!');
      //    return redirect('Logout');
      // } else {
      // }
      $award = DB::table('t_satwa')
         ->select('*')
         ->join('t_awards', 't_awards.id_satwa', '=', 't_satwa.id_satwa')
         ->where('t_satwa.id_satwa', $id)
         ->get();
      // return $award;
      return view('adm_ext.data_award', compact('award', 'id', 'nama_satwa'));
   }
}
