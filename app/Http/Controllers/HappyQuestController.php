<?php

namespace App\Http\Controllers;

use Log;
use App\Models\UserQuest;
use Illuminate\View\View;
use App\Models\HappyQuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;

class HappyQuestController extends Controller
{
    public function index() : View{
        $quests = HappyQuest::where('is_active', true)->paginate(5);
        return view('happyquest.page', compact('quests'));
    }

    public function completeQuest(HappyQuest $quest)
    {
        $user = Auth::user();
    
    $existingQuest = UserQuest::where('user_id', $user->id)
        ->where('happy_quest_id', $quest->id)
        ->where('status', 'completed')
        ->first();
        
    if ($existingQuest) {
        return response()->json([
            'success' => false,
            'message' => 'Quest already completed'
        ], 400);
    }
    
    try {
        DB::beginTransaction();
        
        $userQuest = UserQuest::updateOrCreate(
            [
                'user_id' => $user->id,
                'happy_quest_id' => $quest->id,
            ],
            [
                'status' => 'completed',
                'completed_at' => now()
            ]
        );

        
        DB::commit();
    
        return response()->json([
            'success' => true,
            'message' => 'Quest completed successfully'
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        FacadesLog::error('Quest completion error: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error completing quest'
        ], 500);
    }
    }
}
