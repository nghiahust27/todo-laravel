<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Todos - Todo App</title>

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
           MAIN
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
           ADD BUTTON
        ======================================== */

        .add-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            background: #15b5bc;

            color: white;

            text-decoration: none;

            padding: 13px 22px;

            border-radius: 8px;

            font-size: 15px;

            font-weight: bold;

            transition: 0.2s;
        }

        .add-btn:hover {
            background: #0d9da4;
        }


        /* ========================================
           TODO CONTAINER
        ======================================== */

        .todo-container {
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

        .task-count {
            color: #64748b;

            font-size: 14px;

            white-space: nowrap;
        }


        /* ========================================
           FILTER + SEARCH
        ======================================== */

        .filter-wrapper {
            display: flex;

            align-items: center;

            gap: 25px;

            flex-wrap: wrap;
        }


        /* ========================================
           STATUS FILTER
        ======================================== */

        .filter-links {
            display: flex;

            align-items: center;

            gap: 8px;

            flex-wrap: wrap;
        }

        .filter-links a {
            text-decoration: none;

            color: #64748b;

            background: #f5fafa;

            padding: 8px 16px;

            border-radius: 7px;

            font-size: 13px;

            transition: 0.2s;
        }

        .filter-links a:hover {
            color: #0faab1;

            background: #e5f8f8;
        }

        .filter-links a.active {
            color: white;

            background: #15b5bc;

            font-weight: bold;
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
            width: 230px;

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
           TODO LIST
        ======================================== */

        .todo-list {
            display: flex;

            flex-direction: column;

            gap: 14px;

            padding-top: 25px;
        }


        /* ========================================
           TODO CARD
        ======================================== */

        .todo-card {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 20px;

            border: 1px solid #dceeee;

            border-radius: 10px;

            transition: 0.2s;
        }

        .todo-card:hover {
            border-color: #9ddfe0;

            box-shadow:
                0 4px 15px rgba(0, 150, 150, 0.08);
        }


        /* ========================================
           TODO CONTENT
        ======================================== */

        .todo-content {
            flex: 1;

            min-width: 0;
        }

        .todo-title {
            font-size: 17px;

            font-weight: bold;

            color: #1f2937;

            margin-bottom: 8px;

            word-wrap: break-word;
        }

        .todo-description {
            color: #64748b;

            font-size: 14px;

            line-height: 1.5;

            margin-bottom: 12px;

            word-wrap: break-word;
        }


        /* ========================================
           TODO META
        ======================================== */

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


        /* ========================================
           ACTIONS
        ======================================== */

        .todo-actions {
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

        .edit-btn {
            background: #e5f8f8;

            color: #0faab1;

            text-decoration: none;

            border: none;
        }

        .edit-btn:hover {
            background: #d2f2f2;
        }

        .delete-btn {
            background: #fee2e2;

            color: #dc2626;

            border: none;
        }

        .delete-btn:hover {
            background: #fecaca;
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

            .filter-wrapper {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .task-count {
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

            .add-btn {
                width: 100%;
            }

            .todo-container {
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

            .todo-card {
                align-items: flex-start;

                flex-direction: column;
            }

            .todo-actions {
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
                My Todos
            </h1>

            <p>
                Keep track of your tasks and get things done.
            </p>

        </div>


        <a
            href="{{ route('todos.create') }}"
            class="add-btn"
        >

            <span>
                +
            </span>

            Add New Todo

        </a>


    </div>



    <!-- ========================================
         TODO CONTAINER
    ======================================== -->

    <div class="todo-container">


        <!-- ========================================
             LIST HEADER
        ======================================== -->

        <div class="list-header">


            <div class="list-title">

                <h2>
                    Your Tasks
                </h2>


                <div class="filter-wrapper">


                    <!-- ========================================
                         STATUS FILTER
                    ======================================== -->

                    <div class="filter-links">


                        <!-- ALL -->

                        <a
                            href="{{ route('todos.index', array_filter([
                                'search' => request('search')
                            ])) }}"
                            class="{{ request('status') === null ? 'active' : '' }}"
                        >

                            All

                        </a>


                        <!-- TODO -->

                        <a
                            href="{{ route('todos.index', array_filter([
                                'status' => 'todo',
                                'search' => request('search')
                            ])) }}"
                            class="{{ request('status') === 'todo' ? 'active' : '' }}"
                        >

                            Todo

                        </a>


                        <!-- DOING -->

                        <a
                            href="{{ route('todos.index', array_filter([
                                'status' => 'doing',
                                'search' => request('search')
                            ])) }}"
                            class="{{ request('status') === 'doing' ? 'active' : '' }}"
                        >

                            Doing

                        </a>


                        <!-- DONE -->

                        <a
                            href="{{ route('todos.index', array_filter([
                                'status' => 'done',
                                'search' => request('search')
                            ])) }}"
                            class="{{ request('status') === 'done' ? 'active' : '' }}"
                        >

                            Done

                        </a>


                    </div>



                    <!-- ========================================
                         SEARCH
                    ======================================== -->

                    <form
                        method="GET"
                        action="{{ route('todos.index') }}"
                        class="search-form"
                    >


                        <!--
                            Giữ lại status hiện tại
                            khi người dùng search
                        -->

                        @if(request('status'))

                            <input
                                type="hidden"
                                name="status"
                                value="{{ request('status') }}"
                            >

                        @endif


                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search by title..."
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
                                href="{{ route(
                                    'todos.index',
                                    request('status')
                                        ? ['status' => request('status')]
                                        : []
                                ) }}"
                                class="clear-search"
                            >

                                Clear

                            </a>

                        @endif


                    </form>


                </div>


            </div>



            <!-- ========================================
                 TASK COUNT
            ======================================== -->

            <div class="task-count">

                {{ $todos->count() }}

                {{ $todos->count() === 1 ? 'task' : 'tasks' }}

            </div>


        </div>



        <!-- ========================================
             TODO LIST
        ======================================== -->

        <div class="todo-list">


            @forelse ($todos as $todo)


                <!-- ========================================
                     TODO CARD
                ======================================== -->

                <div class="todo-card">


                    <!-- ========================================
                         TODO CONTENT
                    ======================================== -->

                    <div class="todo-content">


                        <!-- TITLE -->

                        <div class="todo-title">

                            {{ $todo->title }}

                        </div>



                        <!-- DESCRIPTION -->

                        @if ($todo->description)

                            <div class="todo-description">

                                {{ $todo->description }}

                            </div>

                        @endif



                        <!-- META -->

                        <div class="todo-meta">


                            <!-- STATUS -->

                            @if ($todo->status === 'todo')

                                <span class="status status-todo">

                                    Todo

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



                            <!-- DUE DATE -->

                            @if ($todo->due_date)

                                <span class="due-date">

                                    Due:

                                    {{ \Carbon\Carbon::parse($todo->due_date)->format('M d, Y') }}

                                </span>

                            @endif


                        </div>


                    </div>



                    <!-- ========================================
                         ACTIONS
                    ======================================== -->

                    <div class="todo-actions">


                        <!-- EDIT -->

                        <a
                            href="{{ route('todos.edit', $todo->id) }}"
                            class="action-btn edit-btn"
                        >

                            Edit

                        </a>



                        <!-- DELETE -->

                        <form
                            method="POST"
                            action="{{ route('todos.destroy', $todo->id) }}"
                            onsubmit="
                                return confirm(
                                    'Are you sure you want to delete this todo?'
                                );
                            "
                        >

                            @csrf

                            @method('DELETE')


                            <button
                                type="submit"
                                class="action-btn delete-btn"
                            >

                                Delete

                            </button>


                        </form>


                    </div>


                </div>


            @empty


                <!-- ========================================
                     EMPTY STATE
                ======================================== -->

                <div class="empty-state">


                    <div class="empty-icon">

                        ✓

                    </div>


                    <h2>

                        No Todos Found

                    </h2>


                    @if(request('search') || request('status'))

                        <p>

                            No tasks match your current
                            filter or search.

                        </p>

                    @else

                        <p>

                            You don't have any tasks yet.
                            Create your first todo and start getting things done.

                        </p>

                    @endif


                    <a
                        href="{{ route('todos.create') }}"
                        class="add-btn"
                    >

                        + Create New Todo

                    </a>


                </div>


            @endforelse


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