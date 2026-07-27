<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Models\Todo;
use App\Services\TodoService;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function __construct(
        protected TodoService $todoService
    ) { 
    }

    public function index(Request $request)
    {   
        $status = $request->query('status');
        $search = $request->query('search');
        $todos = $this->todoService->getAll(auth()->id(), $status, $search);

        return response()->json([
            'success'=> true,
            'data' => $todos
        ]);
    }

    public function store(StoreTodoRequest $request)
    {
        $todo = $this->todoService->create(
            $request->validated()
        );

        return (new TodoResource($todo))->additional([
            'success'=>true,
            'message' => 'Task created successfully'
        ])->response()->setStatusCode(201);
    }

    public function show(int $id)
    {
        $todo = $this->todoService->getById($id);
        $this -> authorize('view', $todo);
        return new TodoResource($todo);
    }

    public function update(UpdateTodoRequest $request,int $id) {
        $todo = $this->todoService->getById($id);

        $this -> authorize('update', $todo);
        $todo = $this -> todoService->update($id, $request->validated());

        return (new TodoResource($todo))->additional([
            'success'=>true,
            'message' => 'Task created successfully'
        ])->response()->setStatusCode(201);
    }

    public function destroy(int $id)
    {
        $todo = $this->todoService->getById($id);
        $this->authorize('delete', $todo);
        $this ->todoService->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully',
        ]);
    }
}