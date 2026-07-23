<?php

namespace App\Services;
use App\Models\Todo;
use App\Models\User;

class TodoService
{
    public function getAll(int $userId, ?string $status=null, ?string $search =null)
    {
        $query = Todo::where('user_id', $userId);
        if ($status){
            $query ->where('status', $status);
        }
        if($search){
            $query->where('title', 'ILIKE', '%'.$search.'%');
        }
        return $query->get();
    }
    public function create(array $data)
    {
        $user = auth()->user();
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

}