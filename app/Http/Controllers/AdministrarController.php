<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarController extends Controller
{

    public function index(){
      return redirect()->route('administrar.dashboard');
    }

    public function dashboard(){
      return view('administrar.dashboard');
    }
}
