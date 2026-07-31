<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Todo $todo): bool
    {
        if ($todo->group_id === null) {
            return $todo->user_id === $user->id;
        }

        return $todo->group
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }


    public function inGroup(User $user, int $groupId): bool
    {
        return Group::where('groups.id', $groupId)
        ->whereHas('users', function($query) use($user){
            $query->where('users.id', $user->id);
        })->exists();
    }

    public function update(User $user, Todo $todo): bool
    {
        if ($todo->group_id === null) {
            return $todo->user_id === $user->id;
        }

        return $todo->group
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }

    public function delete(User $user, Todo $todo): bool
    {
        if ($todo->group_id === null) {
            return $user->id === $todo-> user_id;
        }
        return $todo->group
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }

    public function restore(User $user, Todo $todo): bool
    {
         if ($todo->group_id === null) {
            return $user->id === $todo-> user_id;
        }
        return $todo->group
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }

    public function forceDelete(User $user, Todo $todo): bool
    {
         if ($todo->group_id === null) {
            return $user->id === $todo-> user_id;
        }
        return $todo->group
            ->users()
            ->where('users.id', $user->id)
            ->exists();
    }
}
