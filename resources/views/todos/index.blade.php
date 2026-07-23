@extends('layouts.app')

@section('title', 'My Todos')

@section('content')

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-3xl font-bold">
                My Todos
            </h1>

            <p class="mt-2 text-gray-500">
                Manage your tasks and stay productive.
            </p>
        </div>

        <a
            href="{{ route('todos.create') }}"
            class="rounded-lg bg-blue-600
                   px-5 py-3
                   font-medium text-white
                   hover:bg-blue-700"
        >
            + Create Todo
        </a>

    </div>

<form action="{{ route('todos.index') }}" method="GET">

    <input
        type="text"
        name="search"
        placeholder="Search by title..."
        value="{{ $search ?? '' }}"
    >

    <select name="status">

        <option value="">
            All Status
        </option>

        <option
            value="todo"
            {{ ($status ?? '') === 'todo' ? 'selected' : '' }}
        >
            Todo
        </option>

        <option
            value="doing"
            {{ ($status ?? '') === 'doing' ? 'selected' : '' }}
        >
            Doing
        </option>

        <option
            value="done"
            {{ ($status ?? '') === 'done' ? 'selected' : '' }}
        >
            Done
        </option>

    </select>

    <button type="submit">
        Search
    </button>

    <a href="{{ route('todos.index') }}">
        Clear
    </a>

</form>
    {{-- Todo list --}}
    @forelse ($todos as $todo)

        <div
            class="mb-4 rounded-xl bg-white
                   p-6 shadow-sm
                   border border-gray-200"
        >

            <div class="flex items-start justify-between">

                {{-- Todo information --}}
                <div>

                    <h2 class="text-xl font-semibold">
                        {{ $todo->title }}
                    </h2>

                    @if ($todo->description)

                        <p class="mt-2 text-gray-600">
                            {{ $todo->description }}
                        </p>

                    @endif

                </div>


                {{-- Status --}}
                <div>

                    @if ($todo->status === 'todo')

                        <span
                            class="rounded-full bg-gray-100
                                   px-3 py-1
                                   text-sm font-medium
                                   text-gray-700"
                        >
                            Todo
                        </span>

                    @elseif ($todo->status === 'doing')

                        <span
                            class="rounded-full bg-yellow-100
                                   px-3 py-1
                                   text-sm font-medium
                                   text-yellow-700"
                        >
                            Doing
                        </span>

                    @elseif ($todo->status === 'done')

                        <span
                            class="rounded-full bg-green-100
                                   px-3 py-1
                                   text-sm font-medium
                                   text-green-700"
                        >
                            Done
                        </span>

                    @endif

                </div>

            </div>


            {{-- Todo metadata --}}
            <div
                class="mt-5 flex items-center
                       justify-between
                       border-t pt-4"
            >

                <div class="text-sm text-gray-500">

                    @if ($todo->due_date)

                        Due:
                        <span class="font-medium">
                            {{ $todo->due_date }}
                        </span>

                    @else

                        No deadline

                    @endif

                </div>


                {{-- Actions --}}
                <div class="flex items-center gap-3">

                    {{-- Edit --}}
                    <a
                        href="{{ route('todos.edit', $todo->id) }}"
                        class="rounded-lg
                               bg-blue-50
                               px-4 py-2
                               text-sm font-medium
                               text-blue-600
                               hover:bg-blue-100"
                    >
                        Edit
                    </a>


                    {{-- Delete --}}
                    <form
                        action="{{ route('todos.destroy', $todo->id) }}"
                        method="POST"
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
                            class="rounded-lg
                                   bg-red-50
                                   px-4 py-2
                                   text-sm font-medium
                                   text-red-600
                                   hover:bg-red-100"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        {{-- Empty state --}}
        <div
            class="rounded-xl bg-white
                   p-12 text-center
                   shadow-sm
                   border border-gray-200"
        >

            <h2 class="text-xl font-semibold">
                No todos yet
            </h2>

            <p class="mt-2 text-gray-500">
                Start by creating your first todo.
            </p>

            <a
                href="{{ route('todos.create') }}"
                class="mt-6 inline-block
                       rounded-lg bg-blue-600
                       px-5 py-3
                       font-medium text-white
                       hover:bg-blue-700"
            >
                Create Todo
            </a>

        </div>

    @endforelse

@endsection