<?php

namespace App\Services;

use App\Models\Group;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Microsoft\Graph\Model\GroupMembers;
use App\Models\Todo;
use Illuminate\Http\Request;

class GroupService
{

//OUT GROUP
    private function generateUniqueGroupCode() {
        do {
            $code = strtoupper(Str::random(8));
        } while (
            Group::where(
                'group_code',
                $code
            )->exists()
        );
        return $code;
    }
    public function getGroups(User $user) {
        return $user->groups()->get();
    }
    public function createGroup(User $user, string $name)
    {
        $group = Group::create([
            'name' => $name,
            'group_code'=>$this->generateUniqueGroupCode(),
            'created_by' => $user->id,
        ]);

        $group ->users() ->attach($user->id);
        return $group;
    }

    public function findByCode(string $groupCode)
    {
        return Group::where('group_code', strtoupper($groupCode))
        ->firstOrFail();
    }

    public function joinGroup(User $user, string $groupCode)
    {
        $group = $this->findByCode($groupCode); 
        $isMember = $group->users()
        ->where('users.id', $user->id)->exists();
        if($isMember){
            throw new \Exception('You are currently a member of this group bro');

        }
        $group->users()->attach($user->id);
        return $group;
    }
    public function leaveGroup(User $user, Group $group)
    {
        
        if($group->created_by === $user->id)
            {
            throw new \Exception('You are group owner bro, cannot leave your group');
            }
        $group->users()->detach($user->id);
    }
    //IN GROUP

    public function getMember(int $groupId) {
        $group = Group::findOrFail($groupId);
        return $group->users()->get();
    }
    
    public function getTasks(int $groupId, ?string $status =null,
    ?string $search = null, int $perPage = 5){
        $query = Todo::where('group_id', $groupId);
        if ($status){
            $query ->where('status', $status);
        }
        if($search){
            $query->where('title', 'ILIKE', '%'.$search.'%');
        }
        return $query->latest()->paginate($perPage)->withQueryString();
    }
    


}