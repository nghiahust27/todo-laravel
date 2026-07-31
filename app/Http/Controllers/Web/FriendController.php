<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Friendship;
use App\Models\User;
use App\Services\FriendService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FriendController extends Controller
{
    public function __construct(
        private FriendService $friendService
    ) {}

    public function index(Request $request){
        $userId = $request->user()->id;
        $friendlists = $this->friendService->getFriends($userId);
        $pendingRequests = $this->friendService
            ->getPendingRequests($userId);
        return view('friends.index', [
            'friendlists' => $friendlists,
            'pendingRequests' => $pendingRequests
        ]);

    }

    public function sendRequest(Request $request, int $friendId)
    {
        $this -> friendService ->sendRequest($request->user()->id, $friendId);
        return back()
        ->with('success', 'Friend request sent successfully');
        
    }
    public function acceptRequest(Request $request, int $friendId)
    {
        $this -> friendService ->acceptRequest($request->user()->id, $friendId);
        return redirect()->route('friends.index')
        ->with('success', 'Friend request accepted');

    }
    public function rejectRequest(Request $request, int $friendId)
    {
        $this -> friendService ->rejectRequest($request->user()->id, $friendId);
        return redirect()->route('todos.index')
        ->with('success', 'Friend request rejected');
    }
    public function search(Request $request): View
    {
        $keyword = $request->input('search');
        $currentUserId = $request->user()->id;

        $users = User::query()
            ->where('id', '!=', $request->user()->id)
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%");
                });
            })
            ->paginate(10)
            ->withQueryString();
        
        $users -> getCollection()->transform(function ($user) 
        use($currentUserId) {
            $friendship = Friendship::where(function($query)
            use($currentUserId, $user){

            $query->where('user_id', $currentUserId)
            ->where('friend_id', $user->id);
        })->first();
            $user->friendship_status = $friendship?->status;

            return $user;
         });

        return view('friends.search', [
            'users' => $users,
            'keyword' => $keyword,
        ]);
    }
    public function friendTodos(
        Request $request,
        int $friendId
    ): View {
        $todos = $this->friendService->getFriendTodos(
            $request->user()->id,
            $friendId
        );

        $friend = User::findOrFail($friendId);

        return view('friends.todos', [
            'friend' => $friend,
            'todos' => $todos,
        ]);
    }
    public function removeFriend(Request $request, int $friendId):
    RedirectResponse{
        $userId = $request->user()->id;
        $this -> friendService->removeFriend($userId, $friendId);
        return back()->with('success', 'Friend removed successfully');
    }

    public function removeRequest(Request $request, int $requestId) :
     RedirectResponse {
        $userId = $request->user()->id;
        $this->friendService->removeRequest($userId, $requestId);
        return back()->with('success', 'Request removed successfully');
        
    }
}
