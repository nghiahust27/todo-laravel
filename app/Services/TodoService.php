<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Todo;
use App\Models\User;

class TodoService
{
    public function getAll(int $userId, ?string $status=null, 
    ?string $search =null, int $perPage = 5)
    {
        
        $query = Todo::where('user_id', $userId)
        ->whereNull('group_id');
        if ($status){
            $query ->where('status', $status);
        }
        if($search){
            $query->where('title', 'ILIKE', '%'.$search.'%');
        }
        return $query->latest()->paginate($perPage)->withQueryString();
    }
    public function create(array $data, User $user)
    {
        return $user->todos()->create($data);
    }
    public function getById(int $id)
    {
        return Todo::findOrFail($id);
    }
    public function update(int $id, array $data)
    {
        $todo = Todo::findOrFail($id);
        $todo -> update($data);
        return $todo->fresh();
    }
    public function delete(int $id){
        $todo = Todo::findOrFail($id);
        return $todo->delete();
    }
    public function getTrashed()
    {
        return Todo::onlyTrashed()->latest('deleted_at')
        ->paginate(5);
    }
    public function  restore(int $id)
     {
        $todo = Todo::onlyTrashed()->findOrFail($id);
        $todo->restore();
        return $todo;      
    }
    public function forceDelete(int $id)  {
        $todo = Todo::onlyTrashed()->findOrFail($id);
        $todo ->forceDelete();       
    }
     public function createGroupTodo(
        array $data,
        User $user,
        int $groupId
    ) {
        $group = Group::findOrFail($groupId);

        return $group->todos()->create([
            ...$data,
            'user_id' => $user->id,
        ]);
    }

}