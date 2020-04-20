<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pendidikan_controller extends Controller
{
    public function index(){
        $title = 'Manage Pendidikan';
        $pendidikan = \DB::table('pendidikan')->get();
 
        return view('pendidikan.pendidikan_index',compact('title','pendidikan'));
    }
 
    public function add(){
        $title = 'Tambah Pendidikan';
 
        return view('pendidikan.pendidikan_add',compact('title'));
    }
 
    public function store(Request $request){
        $this->validate($request,[
            'nama'=>'required',
            'jurusan'=>'required',
            'dari'=>'required',
            'sampai'=>'required',
            'deskripsi'=>'required'
        ]);
 
        try {
            \DB::table('pendidikan')->insert([
                'nama'=>$request->nama,
                'jurusan'=>$request->jurusan,
                'dari'=>date('Y-m-d',strtotime($request->dari)),
                'sampai'=>date('Y-m-d',strtotime($request->sampai)),
                'deskripsi'=>$request->deskripsi
            ]);
 
            \Session::flash('sukses','Data berhasil di tambah');
        } catch (\Exception $e) {
            \Session::flash('gagal','insert table pendidikan '.$e->getMessage().' '.$e->getLine());
        }
 
        return redirect('manage-pendidikan');
    }
 
    public function edit($id){
        $title = 'Edit Pendidikan';
        $dt = \DB::table('pendidikan')->where('id',$id)->first();
 
        return view('pendidikan.pendidikan_edit',compact('title','dt'));
    }
 
    public function update(Request $request,$id){
        $this->validate($request,[
            'nama'=>'required',
            'jurusan'=>'required',
            'dari'=>'required',
            'sampai'=>'required',
            'deskripsi'=>'required'
        ]);
 
        try {
            \DB::table('pendidikan')->where('id',$id)->update([
                'nama'=>$request->nama,
                'jurusan'=>$request->jurusan,
                'dari'=>date('Y-m-d',strtotime($request->dari)),
                'sampai'=>date('Y-m-d',strtotime($request->sampai)),
                'deskripsi'=>$request->deskripsi
            ]);
 
            \Session::flash('sukses','Data berhasil di Update');
        } catch (\Exception $e) {
            \Session::flash('gagal','Proses Update '.$e->getMessage().' | '.$e->getLine());
        }
 
        return redirect('manage-pendidikan');
    }
 
    public function delete($id){
        try {
            \DB::table('pendidikan')->where('id',$id)->delete();
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect('manage-pendidikan');
    }
}
