<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>{{ $friend->name }}'s Todos - Todo App</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        min-height: 100vh;
        background: #e8fafa;
        color: #1f2937;
    }

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
    }

    .logout-btn:hover {
        background: #15b5bc;
        color: white;
    }

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 45px 25px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .friend-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .avatar {
        width: 55px;
        height: 55px;
        background: #dff7f7;
        color: #0faab1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        font-weight: bold;
    }

    .page-title h1 {
        font-size: 30px;
        color: #111827;
        margin-bottom: 6px;
    }

    .page-title p {
        color: #64748b;
        font-size: 14px;
    }

    .back-btn {
        text-decoration: none;
        background: white;
        color: #0faab1;
        border: 1px solid #15b5bc;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
    }

    .back-btn:hover {
        background: #15b5bc;
        color: white;
    }

    .todo-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(0, 100, 100, 0.08);
    }

    .list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5eeee;
        margin-bottom: 20px;
    }

    .list-title {
        font-size: 21px;
        color: #111827;
    }

    .todo-count {
        color: #64748b;
        font-size: 14px;
    }

    .todo-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .todo-card {
        padding: 20px;
        border: 1px solid #dceeee;
        border-radius: 10px;
        transition: 0.2s;
    }

    .todo-card:hover {
        border-color: #9ddfe0;
        box-shadow: 0 4px 15px rgba(0, 150, 150, 0.08);
    }

    .todo-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 10px;
    }

    .todo-title {
        font-size: 17px;
        font-weight: bold;
        color: #1f2937;
    }

    .todo-description {
        color: #64748b;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 15px;
    }

    .todo-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .status {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .status-todo {
        background: #fff7d6;
        color: #a16207;
    }

    .status-doing {
        background: #dff7f7;
        color: #0f8f96;
    }

    .status-done {
        background: #dcfce7;
        color: #15803d;
    }

    .status-default {
        background: #e5e7eb;
        color: #4b5563;
    }

    .due-date {
        color: #94a3b8;
        font-size: 12px;
    }

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
        font-size: 32px;
    }

    .empty-state h2 {
        color: #374151;
        font-size: 22px;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #64748b;
        font-size: 14px;
    }

    footer {
        text-align: center;
        padding: 30px;
        color: #64748b;
        font-size: 13px;
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
            text-align: center;
        }

        .todo-container {
            padding: 20px;
        }

        .todo-header {
            flex-direction: column;
        }
    }
</style>

</head>

<body>

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
            Hello, {{ Auth::user()->name }}
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

<main class="container">

<!-- PAGE HEADER -->

<div class="page-header">

    <div class="friend-info">

        <div class="avatar">
            {{ strtoupper(substr($friend->name, 0, 1)) }}
        </div>

        <div class="page-title">

            <h1>
                {{ $friend->name }}'s Todos
            </h1>

            <p>
                {{ $friend->email }}
            </p>

        </div>

    </div>


    <a
        href="{{ route('friends.index') }}"
        class="back-btn"
    >
        ← Back to Friends
    </a>

</div>


<!-- TODO CONTAINER -->

<div class="todo-container">

    <div class="list-header">

        <h2 class="list-title">
            Tasks
        </h2>

        <span class="todo-count">

            {{ $todos->count() }}

            {{ $todos->count() === 1 ? 'task' : 'tasks' }}

        </span>

    </div>


    <!-- TODO LIST -->

    <div class="todo-list">

        @forelse ($todos as $todo)

            <div class="todo-card">

                <div class="todo-header">

                    <div class="todo-title">
                        {{ $todo->title }}
                    </div>

                </div>


                @if ($todo->description)

                    <div class="todo-description">

                        {{ $todo->description }}

                    </div>

                @endif


                <div class="todo-meta">


                    @if ($todo->status === 'todo')

                        <span class="status status-todo">
                            To Do
                        </span>

                    @elseif ($todo->status === 'doing')

                        <span class="status status-doing">
                            Doing
                        </span>

                    @elseif ($todo->status === 'done')

                        <span class="status status-done">
                            Done
                        </span>

                    @else

                        <span class="status status-default">
                            {{ ucfirst($todo->status) }}
                        </span>

                    @endif


                    @if ($todo->due_date)

                        <span class="due-date">

                            Due:
                            {{ $todo->due_date }}

                        </span>

                    @endif

                </div>

            </div>

        @empty

            <div class="empty-state">

                <div class="empty-icon">
                    ✓
                </div>

                <h2>
                    No Todos Found
                </h2>

                <p>
                    {{ $friend->name }} doesn't have any tasks yet.
                </p>

            </div>

        @endforelse

    </div>

</div>


</main>

<footer>

© 2026 Todo App Inc.
All rights reserved.

</footer>

</body>

</html>
