<?php

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
    $profile = \DB::table('profile')->first();
    $pengalaman = \DB::table('pengalaman')->orderBy('id','asc')->get();
    $skill = \DB::table('skill')->first();
    $skills = preg_split('/\r\n|\r|\n/', $skill->skill);
    $skills = array_chunk($skills, 4);
    // dd($skills);
    $pendidikan = \DB::table('pendidikan')->orderBy('id','asc')->get();
 
    return view('welcome',compact('profile','pengalaman','skill','skills','pendidikan'));
});
//tambah data
Route::get('add-user',function(){
    \DB::table('users')->insert([
        'name'=>'admin',
        'email'=>'z@gmail.com',
        'password'=>bcrypt('123456'),
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')
    ]);
    dd('User berhasil Ditambah');
});

//=======================Admin======================
Route::group(['middleware' => 'auth'], function () {
    //Beranda Admin
    Route::get('/admin','Beranda_controller@index');

    //manage profile
    Route::get('/admin/profile', 'Profile_controller@index');
    Route::put('/admin/profile/{id}', 'Profile_controller@update');

    Route::get('/admin/photo','Photo_controller@index');
    Route::post('/admin/photo','Photo_controller@store');

    // Manage Pengalaman Kerja
    Route::get('/admin/manage-pengalaman','Pengalaman_controller@index');
    Route::get('/admin/manage-pengalaman/add','Pengalaman_controller@add');
    Route::post('/admin/manage-pengalaman','Pengalaman_controller@store');
    Route::get('/admin/manage-pengalaman/{id}','Pengalaman_controller@edit');
    Route::put('/admin/manage-pengalaman/{id}','Pengalaman_controller@update');
    Route::delete('/admin/manage-pengalaman/{id}','Pengalaman_controller@delete' );

    // Manage Skill
    Route::get('manage-skill','Skill_controller@index');
    Route::put('manage-skill','Skill_controller@update');

    // Manage Pendidikan
    Route::get('manage-pendidikan','Pendidikan_controller@index');
    Route::get('manage-pendidikan/add','Pendidikan_controller@add');
    Route::post('manage-pendidikan','Pendidikan_controller@store');
    Route::get('manage-pendidikan/{id}','Pendidikan_controller@edit');
    Route::put('manage-pendidikan/{id}','Pendidikan_controller@update');
    Route::delete('manage-pendidikan/{id}','Pendidikan_controller@delete');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
