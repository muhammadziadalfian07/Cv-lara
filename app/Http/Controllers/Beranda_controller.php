<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda_controller extends Controller
{
    public function index(){
        $title = 'Beranda Admin';

        return view('admin.beranda.beranda_index',compact('title'));
    }
}
