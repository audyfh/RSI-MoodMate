<?php

namespace App\Http\Controllers;

use App\Models\EmotionTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtController extends Controller
{
    public function index(){
        $emotionTracks = EmotionTrack::where('user_id', Auth::id())->get();
        return view('emotiontrack.etpage',compact('emotionTracks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'emotion' => 'required|in:happy,neutral,sad'
        ]);

        EmotionTrack::create([
            'title' => $request->title,
            'content' => $request->content,
            'emotion' => $request->emotion,
            'user_id' => Auth::id()  // Menyimpan id user yang sedang login
        ]);

        return response()->json(['success' => 'Emotion Track berhasil disimpan']);
    }

    // Menghapus data emotion track
    public function destroy($id)
    {
        $emotionTrack = EmotionTrack::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $emotionTrack->delete();

        return redirect()->route('emotion_track.index')->with('success', 'Emotion Track berhasil dihapus');
    }

    
}
