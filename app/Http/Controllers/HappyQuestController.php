<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HappyQuestController extends Controller
{
    public function index(){
        return view('happyquest.page');
    }
}
