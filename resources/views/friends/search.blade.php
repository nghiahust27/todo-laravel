<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Find Friends - Todo App</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .remove-btn {
        background: #fee2e2;
        color: #dc2626;
    }

    .remove-btn:hover {
        background: #fecaca;
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
    .friend-status {
        background: #dcfce7;
        color: #15803d;
        border: none;
        cursor: default;
    }

    .pending-status {
        background: #fff7d6;
        color: #a16207;
        border: none;
        cursor: default;
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

    /* ========================================
       BUTTONS
    ======================================== */

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

    /* ========================================
       FRIEND CONTAINER
    ======================================== */

    .friend-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow:
            0 8px 25px rgba(0, 100, 100, 0.08);
    }

    /* ========================================
       LIST HEADER
    ======================================== */

    .list-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e5eeee;
    }

    .list-title h2 {
        font-size: 21px;
        color: #111827;
        margin-bottom: 18px;
    }
    /* ========================================
   PAGINATION
======================================== */

.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

/* Laravel pagination */
.pagination-wrapper nav {
    display: flex;
    align-items: center;
    justify-content: center;
}

.pagination-wrapper nav > div:first-child {
    display: none;
}

.pagination-wrapper nav > div:last-child {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Tất cả nút pagination */
.pagination-wrapper a,
.pagination-wrapper span {
    min-width: 38px;
    height: 38px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    padding: 0 12px;

    border-radius: 8px;

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;

    transition: 0.2s;
}

    /* Nút bình thường */
    .pagination-wrapper a {
        background: white;
        color: #0faab1;
        border: 1px solid #d7eeee;
    }

    .pagination-wrapper a:hover {
        background: #e8fafa;
        border-color: #15b5bc;
        color: #0d9da4;
    }

    /* Trang hiện tại */
    .pagination-wrapper span[aria-current="page"] {
        background: #15b5bc;
        color: white;
        border: 1px solid #15b5bc;
        box-shadow: 0 3px 8px rgba(21, 181, 188, 0.2);
    }

    /* Nút Previous / Next */
    .pagination-wrapper a[rel="prev"],
    .pagination-wrapper a[rel="next"] {
        padding: 0 15px;
    }

    /* Nút bị disabled */
    .pagination-wrapper span[aria-disabled="true"] {
        background: #f3fafa;
        color: #a0b5b5;
        border: 1px solid #e5eeee;
        cursor: not-allowed;
    }

    /* Dấu ... */
    .pagination-wrapper span:not([aria-current]):not([aria-disabled]) {
        color: #64748b;
        background: transparent;
        border: none;
    }

    .friend-count {
        color: #64748b;
        font-size: 14px;
        white-space: nowrap;
    }

    /* ========================================
       SEARCH
    ======================================== */

    .search-form {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .search-input {
        width: 300px;
        height: 38px;
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
        box-shadow:
            0 0 0 3px rgba(21, 181, 188, 0.1);
    }

    .search-btn {
        height: 38px;
        padding: 0 16px;
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

    .clear-search {
        height: 38px;
        display: flex;
        align-items: center;
        padding: 0 10px;
        color: #dc2626;
        text-decoration: none;
        font-size: 13px;
    }

    .clear-search:hover {
        text-decoration: underline;
    }

    /* ========================================
       FRIEND LIST
    ======================================== */

    .friend-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
        padding-top: 25px;
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
        box-shadow:
            0 4px 15px rgba(0, 150, 150, 0.08);
    }

    /* ========================================
       FRIEND CONTENT
    ======================================== */

    .friend-content {
        flex: 1;
        min-width: 0;
    }

    .friend-title {
        font-size: 17px;
        font-weight: bold;
        color: #1f2937;
        margin-bottom: 8px;
        word-wrap: break-word;
    }

    .friend-email {
        color: #64748b;
        font-size: 14px;
        line-height: 1.5;
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
        padding: 9px 15px;
        border-radius: 7px;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s;
    }

    .add-friend-btn {
        background: #e5f8f8;
        color: #0faab1;
        text-decoration: none;
        border: none;
    }

    .add-friend-btn:hover {
        background: #d2f2f2;
    }

    /* ========================================
       EMPTY STATE
    ======================================== */

    .empty-state {
        text-align: center;
        padding: 60px 20px;
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
        font-size: 38px;
        font-weight: bold;
    }

    .empty-state h2 {
        color: #374151;
        font-size: 22px;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 25px;
    }

    /* ========================================
       PAGINATION
    ======================================== */

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 25px;
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

    @media (max-width: 850px) {

        .list-header {
            flex-direction: column;
        }

        .friend-count {
            order: -1;
        }
    }

    @media (max-width: 700px) {

        header {
            padding: 0 20px;
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

        .back-btn {
            width: 100%;
            justify-content: center;
        }

        .friend-container {
            padding: 20px;
        }

        .search-form {
            width: 100%;
        }

        .search-input {
            flex: 1;
            width: auto;
            min-width: 0;
        }

        .friend-card {
            align-items: flex-start;
            flex-direction: column;
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
            Find Friends
        </h1>

        <p>
            Search for users and add them to your friends.
        </p>

    </div>

    <div class="header-actions">
        <a
            href="{{ route('friends.index') }}"
            class="back-btn"
        >
            ←
            Back to Friends

        </a>

    </div>

</div>


<!-- ========================================
     FRIEND CONTAINER
======================================== -->

<div class="friend-container">


    <!-- ========================================
         LIST HEADER
    ======================================== -->

    <div class="list-header">

        <div class="list-title">

            <h2>
                Search Users
            </h2>


            <!-- ========================================
                 SEARCH
            ======================================== -->

            <form
                method="GET"
                action="{{ route('friends.search') }}"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="{{ $keyword ?? request('search') }}"
                    placeholder="Search by name or email..."
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
                        href="{{ route('friends.search') }}"
                        class="clear-search"
                    >
                        Clear
                    </a>

                @endif

            </form>

        </div>


        <!-- ========================================
             USER COUNT
        ======================================== -->

        <div class="friend-count">

            {{ $users->total() }}

            {{ $users->total() === 1 ? 'user' : 'users' }}

        </div>

    </div>


    <!-- ========================================
         USER LIST
    ======================================== -->

    <div class="friend-list">
        @forelse ($users as $user)
            <div class="friend-card">
                <!-- ========================================
                     USER CONTENT
                ======================================== -->
                <div class="friend-content">
                    <div class="friend-title">
                        {{ $user->name }}
                    </div>
                    <div class="friend-email">
                        {{ $user->email }}
                    </div>
                </div>
                <!-- ========================================
                     ACTIONS
                ======================================== -->
                <div class="friend-actions">
                    @if ($user->friendship_status === 'accepted')
                        <span class="action-btn friend-status">
                            ✓ Your Friend
                        </span>
                    @elseif ($user->friendship_status === 'pending')
                       <form
                            action="{{ route(
                                'friends.removerequest',
                                $user->id
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
                                Remove request
                            </button>
                        </form>
                    @else
                        <form
                            action="{{ route('friends.request', $user->id) }}"
                            method="POST"
                        >
                            @csrf
                            <button
                                type="submit"
                                class="action-btn add-friend-btn"
                            >
                                + Add Friend
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        @empty


            <!-- ========================================
                 EMPTY STATE
            ======================================== -->

            <div class="empty-state">

                <div class="empty-icon">

                    🔍

                </div>


                <h2>

                    No Users Found

                </h2>
                @if(request('search'))
                    <p>
                        No users match your search.

                    </p>
                @else
                    <p>

                        Search for someone by their name
                        or email to add them as a friend.

                    </p>

                @endif

            </div>


        @endforelse

    </div>


    <!-- ========================================
         PAGINATION
    ======================================== -->

    @if ($users->hasPages())

        <div class="pagination-wrapper">

            {{ $users->withQueryString()->links() }}

        </div>

    @endif


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
