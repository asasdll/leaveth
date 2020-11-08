<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|888
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('table', 'NewcompaniesController@table');
Route::get('leave_hr', 'NewcompaniesController@leave_hr');
Route::get('record', 'NewcompaniesController@record');
Route::post('search_leaves', 'NewcompaniesController@search_leaves');
Route::post('search_time', 'NewcompaniesController@search_time');
Route::resource('usersprofile', 'PhotoController');
Route::get('u_show/{id}', 'PhotoController@show');
Route::get('mac', 'AddmacController@mac');
Route::resource('newmac', 'AddmacController');
Route::resource('newcompany', 'NewcompaniesController');
Route::resource('AAA', 'PositionController');
Route::post('divsion/{id}', 'PositionController@create');
Route::get('pos', 'PositionController@pos');
Route::get('pos_p', 'PositionController@pos_p');
Route::get('p_div/{id}', 'PositionController@p_div');
Route::post('p_e_div/{id}', 'PositionController@p_e_div');
Route::get('p_d_div/{id}', 'PositionController@p_d_div');
Route::get('pos_c', 'PositionController@pos_c');
Route::get('pos_c_up/{id}', 'PositionController@pos_c_up');
Route::get('pos_c_d/{id}', 'PositionController@pos_c_d');
Route::resource('posup', 'PositionsupsController');
Route::resource('l_hr', 'Leave_hrController');
//Route::post('up_hr/{id}', 'Leave_hrController@update')->middleware('admin');
Route::post('up_no', 'Leave_hrController@update_no');
//--------------------------------------------------------//


//------Route:: chief::Folder------ //
Route::get('VH', 'MemberuserController@index');
Route::get('recordch', 'MemberuserController@record');
Route::resource('letter', 'LeaveController');
//Route::get('letter2/{id}', 'LeaveController@edit')->middleware('auth');
Route::resource('timestampch', 'TimesController');
Route::resource('down', 'TimesController');
Route::resource('l_chief', 'Leave_chiefController');
//--------------------------------------------------------//

//--------------------------------------------------------//
//--------------member-chief-personnel------------------//
Route::resource('member', 'MemberuserController');


//--------------member--personnel--------------555----//
Route::get('tablepe', 'MemberuserController@tablepe');
Route::get('search_time_user', 'MemberuserController@search_time_user');
Route::get('search_time_chief', 'MemberuserController@search_time_chief');
Route::get('record2', 'MemberuserController@record2');
Route::get('leave2', 'MemberuserController@leave2');
Route::get('leave3', 'MemberuserController@leave3');

Route::get('search', 'PositionController@search');  //ค้าหา พนักงาน

Route::get('pdf/{name}/{date}', 'PositionController@new_pdf');

Route::get('date_pdf/{date}', 'PositionController@pdf_date');

Route::get('name_pdf/{name}', 'PositionController@pdf_name');

Route::get('pdf_leave/{name}', 'LeaveController@pdf_leave');
Route::get('qr-code-g', function () {
    \QrCode::size(500)
              ->format('png');
           
      
    return view('hr.qrCode');
      
  });

  Route::get('account', function () {

    return view('auth.account');
      
  });
  Route::post('code_herd/{id}', 'Code_herdController@update');
  //Route::get('account', 'MemberuserController@create');
  Route::get('resetpass', 'Reset_passwordController@index');
  Route::get('date_leave', 'Date_leaveController@show');
  Route::get('add_lea_top', 'Date_leaveController@create');
  Route::post('leave_date', 'Date_leaveController@store');
  Route::resource('leave_date_index', 'Date_leaveController');
  Route::get('le_date_edit/{id}', 'Date_leaveController@edit');
  Route::post('leave_date_up/{id}', 'Date_leaveController@update');
  Route::get('sum_date', 'Date_leaveController@sum');
  Route::get('add_date', 'Add_dateController@index');
  Route::get('show_date/{id}', 'Add_dateController@show');
  Route::post('up_date/{id}', 'Add_dateController@update');
  Route::get('add_/{id}', 'Add_dateController@create');
  Route::get('add_edit/{id}', 'Add_dateController@edit');
  Route::post('lv_date/{id}', 'Add_dateController@store');
  Route::resource('camera', 'CameraController');
  Route::post('exe', 'CameraController@create');
  Route::get('55', 'SampleController@detectFaces');

