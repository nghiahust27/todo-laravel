<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Services\GroupService;
use App\Services\TodoService;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\StoreTodoRequest;
use App\Models\Todo;

class GroupController extends Controller
{
    public function __construct(
        private GroupService $groupService,
        private TodoService $todoService)
    {}
    // Out Group
    public function index(Request $request)
    {
        
        $user = $request->user();

        $groupLists = $this ->groupService->getGroups($user);
        return view('groups.index', compact('groupLists'));
    }

    public function leaveGroup(Request $request, int $groupId)
    {
        $group = Group::findOrFail($groupId); 
        $user = $request->user();
        try{
            $this->groupService->leaveGroup($user, $group);
            return redirect()->route('groups.index')
            ->with('success', 'Group left successfully');
        }
        catch (\Exception $e) {
        return back()
            ->with('error', $e->getMessage());
        }
    }

    public function showJoinForm()  {
        return view('groups.join');
    }

    public function joinGroup(Request $request) {
        $request ->validate([
            'group_code'=>['required', 'string',
            'exists:groups,group_code']
        ]);
        try{
            $this->groupService->joinGroup($request->user(), $request->group_code);
            return redirect()->route('groups.index')
            ->with('success', 'You joined the group successfully');
        } catch(\Exception $e){
            return back()->withInput()
            ->with('error', $e->getMessage());
        }
        
    }
    public function create()
    {   
        return view('groups.create');
    }

    public function createGroup(Request $request) {
        $request->validate(['name' => [
            'required',
            'string',
            'max:255',
        ],
    ]);
        $user = $request->user();
        $this->groupService->createGroup($user, $request->name);
        return redirect()->route('groups.index')
        ->with('success', 'Group created successfully');

    }

    //In Group
    public function inGroupIndex(Request $request, int $groupId)
    {
        $status = $request->query('status');
        $search = $request->query('search');
        $group = Group::findOrFail($groupId);
        $taskLists = $this->groupService->getTasks($groupId,$status, $search);
        
        $memberLists = $this ->groupService->getMember($groupId);
        return view('groups.ingroup',
        ['taskLists'=>$taskLists,
        'group'=> $group,
        'memberLists'=> $memberLists]);
    }
    public function createTask(){
        return view('groups.todos.create');
    }
    public function store(StoreTodoRequest $request, int $groupId)
    {   
        $this->authorize('createInGroup', [Todo::class, $groupId]);
        $this->todoService->create($request->validated(),
        $request->user(),$groupId);
        return redirect()->route('group.ingroup.index', $groupId)
        ->with('success', 'Task created successfully');
    }
    

}
