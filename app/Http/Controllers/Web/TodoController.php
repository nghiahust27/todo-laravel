<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Http\Requests\Web\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    protected TodoService $todoService;
    public function __construct(TodoService $todoService)
    {
        $this ->todoService = $todoService;
    }
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
        $this -> todoService -> create($request->validated());
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


}
