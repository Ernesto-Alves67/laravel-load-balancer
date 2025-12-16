<?php

namespace App\Http\Controllers;

use App\Services\FriendService;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    protected $friendService;

    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    public function sendRequest(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id' // In a real app, this would come from Auth::id()
        ]);

        try {
            $this->friendService->sendRequest($request->user_id, $request->friend_id);
            return response()->json(['message' => 'Friend request sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function acceptRequest(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:users,id', // The ID of the user who sent the request
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            $this->friendService->acceptRequest($request->user_id, $request->friend_id);
            return response()->json(['message' => 'Friend request accepted.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function rejectRequest(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id'
        ]);

        try {
            $this->friendService->rejectRequest($request->user_id, $request->friend_id);
            return response()->json(['message' => 'Friend request rejected.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function listFriends(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $friends = $this->friendService->getFriends($request->user_id);
        return response()->json($friends);
    }

    public function listPendingRequests(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $requests = $this->friendService->getPendingRequests($request->user_id);
        return response()->json($requests);
    }
}
