<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psikolog;

class MindChatController extends Controller
{
    public function index()
    {
        // Ambil semua data psikolog dari database
        $psikologs = Psikolog::all();

        // Kirimkan data ke view
        return view('mindchat.listpkg', compact('psikologs'));
    }
}
