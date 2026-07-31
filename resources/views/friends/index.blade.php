<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Friends - Todo App</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: white;
        color: #0faab1;
        border: 1px solid #15b5bc;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.2s;
    }

    .back-btn:hover {
        background: #15b5bc;
        color: white;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        min-height: 100vh;
        background: #e8fafa;
        color: #1f2937;
    }

    /* ========================================
       HEADER
    ======================================== */

    header {
        height: 75px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 50px;
        border-bottom: 1px solid #d7eeee;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #13aeb5;
        font-size: 25px;
        font-weight: bold;
    }

    .logo-icon {
        width: 42px;
        height: 42px;
        background: #15b5bc;
        border-radius: 9px;
        color: white;
        font-size: 27px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .user-name {
        color: #64748b;
        font-size: 15px;
    }

    .logout-btn {
        border: 1px solid #15b5bc;
        background: white;
        color: #0faab1;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.2s;
    }

    .logout-btn:hover {
        background: #15b5bc;
        color: white;
    }

    /* ========================================
       CONTAINER
    ======================================== */

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 45px 25px;
    }

    /* ========================================
       PAGE HEADER
    ======================================== */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .page-title h1 {
        font-size: 32px;
        color: #111827;
        margin-bottom: 8px;
    }

    .page-title p {
        color: #64748b;
        font-size: 15px;
    }

    .header-actions {
        display: flex;
        gap: 10px;
    }

    /* ========================================
       BUTTONS
    ======================================== */

    .add-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: #15b5bc;
        color: white;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .add-btn:hover {
        background: #0d9da4;
    }

    /* ========================================
       FRIEND CONTAINER
    ======================================== */

    .friend-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 100, 100, 0.08);
    }

    /* ========================================
       FLASH MESSAGE
    ======================================== */

    .alert {
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-success {
        background: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }

    .alert-error {
        background: #fee2e2;
        color: #dc2626;
        border: 1px solid #fecaca;
    }

    /* ========================================
       SECTION
    ======================================== */

    .section {
        margin-bottom: 35px;
    }

    .section:last-child {
        margin-bottom: 0;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 18px;
        border-bottom: 1px solid #e5eeee;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 21px;
        color: #111827;
    }

    .friend-count {
        color: #64748b;
        font-size: 14px;
    }

    /* ========================================
       SEARCH
    ======================================== */

    .search-form {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 25px;
    }

    .search-input {
        flex: 1;
        height: 40px;
        padding: 0 13px;
        border: 1px solid #d7eeee;
        border-radius: 7px;
        outline: none;
        color: #374151;
        font-size: 13px;
        background: white;
        transition: 0.2s;
    }

    .search-input::placeholder {
        color: #94a3b8;
    }

    .search-input:focus {
        border-color: #15b5bc;
        box-shadow: 0 0 0 3px rgba(21, 181, 188, 0.1);
    }

    .search-btn {
        height: 40px;
        padding: 0 18px;
        border: none;
        border-radius: 7px;
        background: #15b5bc;
        color: white;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s;
    }

    .search-btn:hover {
        background: #0d9da4;
    }

    /* ========================================
       FRIEND LIST
    ======================================== */

    .friend-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    /* ========================================
       FRIEND CARD
    ======================================== */

    .friend-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
        border: 1px solid #dceeee;
        border-radius: 10px;
        transition: 0.2s;
    }

    .friend-card:hover {
        border-color: #9ddfe0;
        box-shadow: 0 4px 15px rgba(0, 150, 150, 0.08);
    }

    .friend-info {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 0;
    }

    .avatar {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        background: #dff7f7;
        color: #0faab1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: bold;
    }

    .friend-content {
        min-width: 0;
    }

    .friend-name {
        font-size: 16px;
        font-weight: bold;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .friend-email {
        color: #64748b;
        font-size: 13px;
    }

    /* ========================================
       ACTIONS
    ======================================== */

    .friend-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 15px;
        border-radius: 7px;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s;
        text-decoration: none;
        border: none;
    }

    .view-btn {
        background: #e5f8f8;
        color: #0faab1;
    }

    .view-btn:hover {
        background: #d2f2f2;
    }

    .accept-btn {
        background: #dcfce7;
        color: #15803d;
    }

    .accept-btn:hover {
        background: #bbf7d0;
    }

    .reject-btn {
        background: #fee2e2;
        color: #dc2626;
    }

    .reject-btn:hover {
        background: #fecaca;
    }

    .remove-btn {
        background: #fee2e2;
        color: #dc2626;
    }

    .remove-btn:hover {
        background: #fecaca;
    }

    /* ========================================
       EMPTY STATE
    ======================================== */

    .empty-state {
        text-align: center;
        padding: 45px 20px;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        background: #dff7f7;
        color: #15b5bc;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: bold;
    }

    .empty-state h2 {
        color: #374151;
        font-size: 21px;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* ========================================
       PAGINATION
    ======================================== */

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        margin-top: 25px;
    }

    .pagination a,
    .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 35px;
        height: 35px;
        padding: 0 10px;
        border-radius: 7px;
        font-size: 13px;
        text-decoration: none;
    }

    .pagination a {
        border: 1px solid #d7eeee;
        color: #64748b;
        background: white;
    }

    .pagination a:hover {
        background: #e5f8f8;
        color: #0faab1;
    }

    .pagination .active {
        background: #15b5bc;
        color: white;
        font-weight: bold;
    }

    /* ========================================
       FOOTER
    ======================================== */

    footer {
        text-align: center;
        padding: 30px;
        color: #64748b;
        font-size: 13px;
    }

    /* ========================================
       RESPONSIVE
    ======================================== */

    @media (max-width: 700px) {

        header {
            padding: 0 20px;
        }
        .back-btn {
            width: 100%;
            justify-content: center;
        }

        .user-name {
            display: none;
        }

        .container {
            padding: 30px 15px;
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 20px;
        }

        .header-actions {
            width: 100%;
        }

        .add-btn {
            width: 100%;
            justify-content: center;
        }

        .friend-container {
            padding: 20px;
        }

        .search-form {
            flex-direction: column;
            align-items: stretch;
        }

        .search-input {
            width: 100%;
        }

        .search-btn {
            width: 100%;
        }

        .friend-card {
            align-items: flex-start;
            flex-direction: column;
        }

        .friend-info {
            width: 100%;
        }

        .friend-actions {
            width: 100%;
        }

        .action-btn {
            flex: 1;
            text-align: center;
        }
    }
</style>


</head>

<body>

<!-- ========================================
     HEADER
======================================== -->

<header>


<div class="logo">
    <div class="logo-icon">
        ✓
    </div>

    Todo App
</div>

<div class="header-right">

    @auth

        <span class="user-name">
            Hello,
            {{ Auth::user()->name }}
        </span>

        <form
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf

            <button
                type="submit"
                class="logout-btn"
            >
                Log Out
            </button>
        </form>

    @endauth

</div>


</header>

<!-- ========================================
     MAIN
======================================== -->

<main class="container">


<!-- ========================================
     PAGE HEADER
======================================== -->

<div class="page-header">

    <div class="page-title">

        <h1>
            Friends
        </h1>

        <p>
            Connect with friends and view their tasks.
        </p>

    </div>

    <div class="header-actions">
        <a
            href="{{ route('todos.index') }}"
            class="back-btn"
        >
            ←
            Back to Todos
        </a>
        <a
            href="{{ route('friends.search') }}"
            class="add-btn"
        >
            <span>
                +
            </span>

            Add New Friend
        </a>

    </div>

</div>


<!-- ========================================
     FLASH MESSAGES
======================================== -->

@if (session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


@if (session('error'))

    <div class="alert alert-error">
        {{ session('error') }}
    </div>

@endif


<!-- ========================================
     FRIEND CONTAINER
======================================== -->

<div class="friend-container">


    <!-- ========================================
         SEARCH FRIENDS
    ======================================== -->

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                My Friends
            </h2>
            <span class="friend-count">
                {{ $friendlists->count() }}

                {{ $friendlists->count() === 1 ? 'friend' : 'friends' }}

            </span>

        </div>
        <!-- SEARCH -->

        <form
            method="GET"
            action="{{ route('friends.index') }}"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search your friends..."
                class="search-input"
            >

            <button
                type="submit"
                class="search-btn"
            >
                Search
            </button>

            @if(request('search'))

                <a
                    href="{{ route('friends.index') }}"
                    class="clear-search"
                >
                    Clear
                </a>

            @endif

        </form>

        <!-- FRIEND LIST -->

        <div class="friend-list">
            @forelse ($friendlists as $friend)
                <div class="friend-card">
                    <div class="friend-info">
                        <div class="avatar">
                            {{ strtoupper(
                                substr($friend->name, 0, 1)
                            ) }}
                        </div>
                        <div class="friend-content">
                            <div class="friend-name">
                                {{ $friend->name }}
                            </div>
                            <div class="friend-email">
                                {{ $friend->email }}
                            </div>
                        </div>
                    </div>

                    <div class="friend-actions">
                        <!-- View Friend's Todos -->
                        <a
                            href="{{ route(
                                'friends.todos',
                                $friend->id
                            ) }}"
                            class="action-btn view-btn"
                        >
                            View Tasks
                        </a>


                        <!-- Remove Friend -->

                        <form
                            action="{{ route(
                                'friends.remove',
                                $friend->id
                            ) }}"
                            method="POST"
                            onsubmit="return confirm(
                                'Are you sure you want to remove this friend?'
                            )"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="action-btn remove-btn"
                            >
                                Remove
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">
                        👥
                    </div>
                    <h2>
                        No Friends Found
                    </h2>
                    @if(request('search'))
                        <p>
                            No friends match your search.
                        </p>
                    @else
                        <p>
                            You don't have any friends yet.
                            Add someone and start connecting.
                        </p>
                        <a
                            href="{{ route('friends.search') }}"
                            class="add-btn"
                        >
                            + Find Friends
                        </a>
                    @endif
                </div>
            @endforelse

        </div>
        <!-- ========================================
         FRIEND REQUESTS
    ======================================== -->

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Friend Requests
            </h2>

            <span class="friend-count">
                {{ $pendingRequests->count() }}
                {{ $pendingRequests->count() === 1 ? 'request' : 'requests' }}
            </span>

        </div>
        
        <div class="friend-list">
            @forelse ($pendingRequests as $request)
                <div class="friend-card">
                    <div class="friend-info">
                        <div class="avatar">
                            {{ strtoupper(substr($request->user->name, 0, 1)) }}
                        </div>
                        <div class="friend-content">
                            <div class="friend-name">
                                {{ $request->user->name }}
                            </div>
                            <div class="friend-email">
                                {{ $request->user->email }}
                            </div>
                        </div>
                    </div>
                    <div class="friend-actions">
                        <!-- Accept -->
                        <form
                            action="{{ route(
                                'friends.requests.accept',
                                $request->id
                            ) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PATCH')
                            <button
                                type="submit"
                                class="action-btn accept-btn"
                            >
                                Accept
                            </button>
                        </form>
                        <!-- Reject -->
                        <form
                            action="{{ route(
                                'friends.requests.reject',
                                $request->id
                            ) }}"
                            method="POST"
                        >
                            @csrf
                            @method('PATCH')
                            <button
                                type="submit"
                                class="action-btn reject-btn"
                            >
                                Reject
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        x
                    </div>
                    <h2>
                        No Friend Requests
                    </h2>
                    <p>
                        You don't have any pending friend requests.
                    </p>
                </div>
            @endforelse
        </div>
    </div>


        <!-- ========================================
             PAGINATION
        ======================================== -->

        @if ($friendlists instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $friends->hasPages())

            <div class="pagination">
                

                @if ($friendlists->onFirstPage())

                    <span style="color: #cbd5e1;">
                        ←
                    </span>

                @else

                    <a href="{{ $friendlists->previousPageUrl() }}"
                    >
                        ←
                    </a>

                @endif


                @for (
                    $page = 1;
                    $page <= $friendlists->lastPage();
                    $page++
                )

                    @if ($page == $friendlists->currentPage())

                        <span class="active">
                            {{ $page }}
                        </span>

                    @else

                        <a href="{{ $friendlists->url($page) }}">
                            {{ $page }}
                        </a>

                    @endif

                @endfor


                @if ($friends->hasMorePages())

                    <a href="{{ $friends->nextPageUrl() }}"
                    class="back-btn">
                        →
                    </a>

                @else

                    <span style="color: #cbd5e1;">
                        →
                    </span>

                @endif

            </div>

        @endif

    </div>

</div>


</main>

<!-- ========================================
     FOOTER
======================================== -->

<footer>


© 2026 Todo App Inc.
All rights reserved.


</footer>

</body>

</html>
