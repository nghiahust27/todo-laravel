<?php

namespace App\Services;

use App\Models\Friendship;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class FriendService
{
    public function sendRequest(int $userId, int $friendId):
    Friendship {
        if($userId === $friendId){
            throw ValidationException::withMessages(
                ["friend_id" => "You cannot send a friend request to yourself dawg"]);
        }
        $existing = Friendship::where('user_id', $userId)
        ->where('friend_id', $friendId)->first();
        if($existing){
            throw ValidationException::withMessages(
                ['friend_id'=>'friend request already exist']
            );
        }
        $reverse = Friendship::where('user_id', $friendId)
        ->where('friend_id', $userId)->first();
        if($reverse){
            throw ValidationException::withMessages(
                ['friend_id' => 'This user has already sent you a friend request']
            );
        }
        return Friendship::create([
            'user_id' => $userId,
            'friend_id' => $friendId,
            'status' => 'pending',
        ]);
    }
    public function getPendingRequests(int $userId): Collection{
        return Friendship::with('user')
        ->where('friend_id',  $userId)
        ->where('status', 'pending')->get();
    }
    public function acceptRequest(int $userId, int $requestId):Friendship
    {
        return DB::transaction(function() use($userId, $requestId)
        {
            $friendship = Friendship::where('id', $requestId)
            ->where('friend_id', $userId)
            ->where('status', 'pending')->firstOrFail();
            $friendship ->update(['status' => 'accepted']);
            Friendship::updateOrCreate([
                'user_id'=>$userId,
                'friend_id' =>$friendship->user_id],
                ['status'=> 'accepted']
            );
            return $friendship->fresh();
        });
    }
    public function rejectRequest(int $userId, int $requestId): bool
    {
        $friendship = Friendship::where('id', $requestId)
        ->where('user_id', $userId)
        ->where('status', 'pending')->firstOrFail();
        return $friendship ->update(['status' => 'rejected']);

    }
    public function getFriends(int $userId): Collection
    {
        $friendIds = Friendship::where('user_id', $userId)
            ->where('status', 'accepted')
            ->pluck('friend_id');

        return User::whereIn('id', $friendIds)->get();
    }

    public function removeFriend(int $userId, int $friendId): void{
        DB::transaction(function() use($userId, $friendId){
            Friendship::where('user_id', $userId)->where('friend_id', $friendId)
            ->delete();
            Friendship::where('user_id', $friendId)->where('friend_id', $userId)
            ->delete();
        });
    }
    public function removeRequest(int $userId, int $requestId): void{
        DB::transaction(function() use($userId, $requestId){
            Friendship::where('user_id', $userId)->where('friend_id', $requestId)
            ->delete();
        });
    }

    public function getFriendTodos(int $userId, int $friendId)
    {
        $areFriends = Friendship::where('status', 'accepted')
            ->where(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $userId)
                    ->where('friend_id', $friendId);
            })
            ->orWhere(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $friendId)
                    ->where('friend_id', $userId);
            })
            ->exists();
        abort_unless($areFriends, 403);
        return Todo::where('user_id', $friendId)
            ->latest()
            ->get();
    }
    

    public function __construct()
    {
        
    }
}
