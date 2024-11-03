<?php

namespace App\Http\Controllers;

use App\Models\HappyQuest;
use App\Models\UserQuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    public function completeQuest(HappyQuest $quest)
    {
        $user = Auth::user();
        
        try {
            $userQuest = UserQuest::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'quest_id' => $quest->id,
                ],
                [
                    'status' => 'completed',
                    'completed_at' => now()
                ]
            );
    

    
            return response()->json([
                'success' => true,
                'message' => 'Quest completed successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error completing quest'
            ], 500);
        }
    }
}
