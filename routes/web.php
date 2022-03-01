<?php

use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerSatwa;
use App\Http\Controllers\ControllerSupport;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('about_us', function () {
    return view('about_us');
});
Route::get('trah', [ControllerSupport::class, 'data_satwa']);
Route::get('/data_satwa_jantan', [ControllerSupport::class, 'data_satwa_ras_jantan']);
Route::get('/data_satwa_betina', [ControllerSupport::class, 'data_satwa_ras_betina']);
Route::get('/data_satwa_by_id', [ControllerSupport::class, 'data_satwa_by_id']);
Route::get('showing', function () {
    return view('showing');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('/data_ras', [ControllerSatwa::class, 'data_ras']);
Route::post('/add_ras', [ControllerSatwa::class, 'add_ras']);
Route::post('/edit_ras/{id}', [ControllerSatwa::class, 'edit_ras']);
Route::get('/hapus_ras/{id}', [ControllerSatwa::class, 'hapus_ras']);



// admin_ext
Route::get('adm_ext', function () {
    return view('adm_ext.index');
});
Route::get('adm_ext_home', function () {
    return view('adm_ext.home');
});
// Route::get('adm_ext_data_satwa', function () {
//     return view('adm_ext.data_satwa');
// });
Route::get('/adm_ext_data_satwa', [ControllerSatwa::class, 'show_satwa']);
Route::post('/add_satwa', [ControllerSatwa::class, 'add_satwa']);
Route::post('/edit_satwa/{id}', [ControllerSatwa::class, 'edit_satwa']);


Route::get('adm_ext_data_artikel', function () {
    return view('adm_ext.data_artikel');
});
Route::get('adm_ext_data_contact', function () {
    return view('adm_ext.data_contact');
});

Route::post('login', [ControllerLogin::class, 'login']);
