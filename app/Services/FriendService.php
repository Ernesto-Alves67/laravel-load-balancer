<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class FriendService
{
    public function sendRequest($userId, $friendId)
    {
        if ($userId == $friendId) {
            throw new \Exception("You cannot send a friend request to yourself.");
        }

        // Check if friendship already exists (in either direction)
        $exists = DB::table('friendships')
            ->where(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $userId)->where('friend_id', $friendId);
            })
            ->orWhere(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $friendId)->where('friend_id', $userId);
            })
            ->exists();

        if ($exists) {
            throw new \Exception("Friendship request already exists or you are already friends.");
        }

        return DB::table('friendships')->insert([
            'user_id' => $userId,
            'friend_id' => $friendId,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function acceptRequest($userId, $friendId)
    {
        // The user accepting the request is the 'friend_id' in the table
        $updated = DB::table('friendships')
            ->where('user_id', $friendId) // The sender
            ->where('friend_id', $userId) // The receiver (current user)
            ->where('status', 'pending')
            ->update(['status' => 'accepted', 'updated_at' => now()]);

        if (!$updated) {
            throw new \Exception("Friend request not found or already handled.");
        }

        return true;
    }

    public function rejectRequest($userId, $friendId)
    {
        $updated = DB::table('friendships')
            ->where('user_id', $friendId)
            ->where('friend_id', $userId)
            ->where('status', 'pending')
            ->update(['status' => 'rejected', 'updated_at' => now()]);

        if (!$updated) {
            throw new \Exception("Friend request not found or already handled.");
        }

        return true;
    }

    public function getFriends($userId)
    {
        // Get friends where user is sender OR receiver and status is accepted
        $friends1 = DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.friend_id')
            ->where('friendships.user_id', $userId)
            ->where('friendships.status', 'accepted')
            ->select('users.*');

        $friends2 = DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user_id')
            ->where('friendships.friend_id', $userId)
            ->where('friendships.status', 'accepted')
            ->select('users.*');

        return $friends1->union($friends2)->get();
    }

    public function getPendingRequests($userId)
    {
        // Requests sent TO the user
        return DB::table('friendships')
            ->join('users', 'users.id', '=', 'friendships.user_id')
            ->where('friendships.friend_id', $userId)
            ->where('friendships.status', 'pending')
            ->select('users.id', 'users.name', 'users.email', 'friendships.created_at as request_date')
            ->get();
    }
}
