@extends('layouts.app')

@section('title', 'Create Task')

@section('content')

    <div class="max-w-2xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <a
                href="{{ route('groups.index') }}"
                class="text-sm text-blue-600
                       hover:text-blue-800"
            >
                ← Back to Groups
            </a>

            <h1 class="mt-4 text-3xl font-bold">
                Create Task
            </h1>

            <p class="mt-2 text-gray-500">
                Add a new task to your todo list.
            </p>

        </div>


        {{-- Form --}}
        <div
            class="rounded-xl bg-white
                   p-8 shadow-sm
                   border border-gray-200"
        >

            <form
                action="{{ route('groups.todos.store', ['groupId' => $group->id]) }}"
                method="POST"
            >
                @csrf
                {{-- Title --}}
                <div class="mb-6">
                    <label
                        for="title"
                        class="mb-2 block
                               text-sm font-medium"
                    >
                        Title
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter todo title"
                        required
                        class="w-full rounded-lg
                               border border-gray-300
                               px-4 py-3
                               focus:border-blue-500
                               focus:ring-blue-500"
                    >
                    @error('title')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Description --}}
                <div class="mb-6">

                    <label
                        for="description"
                        class="mb-2 block
                               text-sm font-medium"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Enter todo description"
                        class="w-full rounded-lg
                               border border-gray-300
                               px-4 py-3
                               focus:border-blue-500
                               focus:ring-blue-500"
                    >{{ old('description') }}</textarea>

                    @error('description')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Status --}}
                <div class="mb-6">

                    <label
                        for="status"
                        class="mb-2 block
                               text-sm font-medium"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-lg
                               border border-gray-300
                               px-4 py-3
                               focus:border-blue-500
                               focus:ring-blue-500"
                    >

                        <option
                            value="todo"
                            {{ old('status', 'todo') === 'todo'
                                ? 'selected'
                                : '' }}
                        >
                            Todo
                        </option>

                        <option
                            value="doing"
                            {{ old('status') === 'doing'
                                ? 'selected'
                                : '' }}
                        >
                            Doing
                        </option>

                        <option
                            value="done"
                            {{ old('status') === 'done'
                                ? 'selected'
                                : '' }}
                        >
                            Done
                        </option>

                    </select>

                    @error('status')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Due date --}}
                <div class="mb-8">

                    <label
                        for="due_date"
                        class="mb-2 block
                               text-sm font-medium"
                    >
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                        class="w-full rounded-lg
                               border border-gray-300
                               px-4 py-3
                               focus:border-blue-500
                               focus:ring-blue-500"
                    >

                    @error('due_date')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Buttons --}}
                <div class="flex items-center gap-3">

                    <button
                        type="submit"
                        class="rounded-lg
                               bg-blue-600
                               px-6 py-3
                               font-medium text-white
                               hover:bg-blue-700"
                    >
                        Create Task
                    </button>

                    <a
                        href="{{ route('groups.index') }}"
                        class="rounded-lg
                               bg-gray-100
                               px-6 py-3
                               font-medium text-gray-700
                               hover:bg-gray-200"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection