<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BocController extends Controller
{
    public function index(){
        return view('boc.page');
    }
}
