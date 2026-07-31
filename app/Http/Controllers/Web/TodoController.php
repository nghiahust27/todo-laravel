<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Http\Requests\Web\UpdateTodoRequest;
use App\Models\Group;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    public function __construct(
        private TodoService $todoService
    ) {}
    public function index(Request $request)
    {
  
        $status = $request->query('status');
        $search = $request->query('search');
        $todos = $this->todoService->getAll(auth()->id(), $status, $search);
            
        return view('todos.index', compact('todos', 'status', 'search'));
    }
    public function create()
    {
        return view('todos.create');
    }
    
    public function store(StoreTodoRequest $request)
    {
        $this->todoService->create(
        $request->validated(),
        $request->user()
    );
        return redirect()->route('todos.index')
        ->with('success', 'Todo created successfully');
    }
    public function edit(int $id){
        $todo = $this -> todoService -> getById($id);
        Gate::authorize('update', $todo);
        return view('todos.edit', compact('todo'));
    }
    public function update(UpdateTodoRequest $request, int $id)
    {
        $todo = $this -> todoService -> getById($id);
        Gate::authorize('update', $todo);
        $this -> todoService ->update($id, $request->validated());
        return redirect()->route('todos.index')
        ->with('success', 'Todo updated successfully');
    }
    public function destroy(int $id)
    {
        $todo = $this -> todoService ->getById($id);
        Gate::authorize('delete', $todo);
        $this ->todoService->delete($id);
        return redirect()->route('todos.index')
        ->with('success', 'Todo deleted successfully');
    }
    public function trash()
    {
        $todos = $this ->todoService->getTrashed();
        return view('todos.trash', compact('todos'));
    }
    public function forceDelete(int $id)
    {
        $todo = Todo::onlyTrashed()->findOrFail($id);
        $this ->authorize('forceDelete', $todo);
        $this -> todoService->forceDelete($id);
        return redirect()->route('todos.trash')
        ->with('success', 'Todo deleted');
    }
    public function restore(int $id) {
        $todo = Todo::onlyTrashed()->findOrFail($id);
        $this->authorize('restore', $todo);
        $this->todoService->restore($id);
        return redirect()->route('todos.trash')
        ->with('success', "Todo restored successfully");
        
    }

    //       IN GROUP
    public function createGroupTodo(int $groupId) { 
        $this->authorize(
            'createInGroup',
            [Todo::class, $groupId]
        );
        $group = Group::findOrFail($groupId);
        return view('groups.createtodos', compact('group') );
    }
    public function storeGroupTodo( StoreTodoRequest $request,
        int $groupId ) {
        $this->authorize( 'inGroup',[Todo::class, $groupId]);
        $this->todoService->createGroupTodo(
            $request->validated(),
            $request->user(),
            $groupId
        );
        return redirect() 
            ->route('groups.todos.index', $groupId   )
            ->with('success','Task created successfully' );
    }
    public function editGroupTodo(int $id, int $groupId){
        $todo = $this -> todoService -> getById($id);
        $this->authorize( 'inGroup',[Todo::class, $groupId]);
        return view('groups.todos.edit', $groupId, compact('todo'));
    }
    public function updateGroupTodo(UpdateTodoRequest $request, int $id,
    int $groupId)
    {
        $todo = $this -> todoService -> getById($id);
        $this->authorize( 'inGroup',[Todo::class, $groupId]);
        $this->authorize('update', $todo);
        $this -> todoService ->update($id, $request->validated());
        return redirect()->route('groups.todos.index')
        ->with('success', 'Todo updated successfully');
    }
    public function destroyGroupTodo(int $id, int $groupId)
    {
        $todo = $this -> todoService ->getById($id);
        $this->authorize( 'inGroup',[Todo::class, $groupId]);
        $this->authorize('delete', $todo);
        $this ->todoService->forceDelete($id);
        return redirect()->route('groups.todos.index')
        ->with('success', 'Todo deleted successfully');
    }

}
