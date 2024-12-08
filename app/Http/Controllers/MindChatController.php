<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psikolog;

class MindChatController extends Controller
{
    public function index()
    {
        $psikologs = Psikolog::all();

        return view('mindchat.listpkg', compact('psikologs'));
    }
}
