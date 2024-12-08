<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Quest;
use App\Models\HappyQuest;
use Illuminate\Http\Request;

class AdminQuestController extends Controller
{
    public function index()
    {
        $quests = HappyQuest::paginate(5);
        return view('admin.happyquest', compact('quests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $validated['is_active'] = true;

        HappyQuest::create($validated);

        return redirect()->route('admin.happyquest')
            ->with('success', 'Quest created successfully');
    }

    public function update(Request $request, HappyQuest $quest)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean'
        ]);
    
        // Explicitly set is_active to true
        $validated['is_active'] = true;
    
        $quest->update($validated);
    
        return redirect()->route('admin.happyquest')
            ->with('success', 'Quest updated successfully');
    }

    public function destroy(HappyQuest $quest)
    {
        $quest->delete();
        
        return redirect()->route('admin.happyquest')
            ->with('success', 'Quest deleted successfully');
    }
}