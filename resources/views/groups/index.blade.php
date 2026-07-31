<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Groups - Todo App</title>

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

    .group-container {
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

    .group-count {
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

    .group-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    /* ========================================
       FRIEND CARD
    ======================================== */

    .group-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
        border: 1px solid #dceeee;
        border-radius: 10px;
        transition: 0.2s;
    }
    .todo-list {
            display: flex;
            flex-direction: column;

            gap: 14px;

            padding-top: 25px;
        }
    .group-card:hover {
        border-color: #9ddfe0;
        box-shadow: 0 4px 15px rgba(0, 150, 150, 0.08);
    }

    .group-info {
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

    .group-content {
        min-width: 0;
    }

    .group-name {
        font-size: 16px;
        font-weight: bold;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .group-code {
        color: #64748b;
        font-size: 13px;
    }

    /* ========================================
       ACTIONS
    ======================================== */

    .group-actions {
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

        .group-container {
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

        .group-card {
            align-items: flex-start;
            flex-direction: column;
        }

        .group-info {
            width: 100%;
        }

        .group-actions {
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
            Groups
        </h1>
        <p>
            Join groups and collaborate on shared tasks.
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
            href="{{ route('groups.create') }}"
            class="add-btn"
        >
            <span>
                +
            </span>
            Create New Group
        </a>
        <a
            href="{{ route('groups.join.form') }}"
            class="add-btn"
        >
            <span>
                +
            </span>
            Join New Group
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

<div class="group-container">


    <!-- ========================================
         SEARCH FRIENDS
    ======================================== -->

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                My Groups
            </h2>
            <span class="group-count">
                {{ $groupLists->count() }}
                {{ $groupLists->count() === 1 ? 'group' : 'groups' }}
            </span>
        </div>

        <!-- GROUP LIST -->

        <div class="group-list">
            @forelse ($groupLists as $group)
                <div class="group-card">
                    <div class="group-info">
                        <div class="avatar">
                            {{ strtoupper(
                                substr($group->name, 0, 1)
                            ) }}
                        </div>
                        <div class="group-content">
                            <div class="group-name">
                                {{ $group->name }}
                            </div>
                            <div class="group-code">
                                {{ $group->group_code }}
                            </div>
                        </div>
                    </div>

                    <div class="group-actions">
                        <!-- View group's Todos -->
                        <a
                            href="{{ route(
                                'groups.todos.index',
                                $group->id
                            ) }}"
                            class="action-btn view-btn"
                        >
                            View Groups
                        </a>
                        <!-- Remove Friend -->
                        <form
                            action="{{ route(
                                'groups.leave',
                                $group->id
                            ) }}"
                            method="POST"
                            onsubmit="return confirm(
                                'Are you sure you want to leave this group?'
                            )"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="action-btn remove-btn"
                            >
                                Leave
                            </button>
                        </form>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        @if ($groupLists instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $groupLists->hasPages())
            <div class="pagination">
                @if ($groupLists->onFirstPage())
                    <span style="color: #cbd5e1;">
                        ←
                    </span>
                @else
                    <a href="{{ $groupLists->previousPageUrl() }}"
                    >
                        ←
                    </a>
                @endif
                @for (
                    $page = 1;
                    $page <= $groupLists->lastPage();
                    $page++
                )
                    @if ($page == $groupLists->currentPage())

                        <span class="active">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $groupLists->url($page) }}">
                            {{ $page }}
                        </a>
                    @endif

                @endfor


                @if ($groupLists->hasMorePages())

                    <a href="{{ $groupLists->nextPageUrl() }}"
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
