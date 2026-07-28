@extends('layouts.app')

@section('title', 'Trash')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">

        <div>
            <a
                href="{{ route('todos.index') }}"
                class="text-sm text-blue-600 hover:text-blue-800"
            >
                ← Back to Todos
            </a>

            <h1 class="mt-4 text-3xl font-bold">
                Trash
            </h1>

            <p class="mt-2 text-gray-500">
                Deleted todos can be restored or permanently deleted.
            </p>
        </div>

    </div>


    {{-- Success Message --}}
    @if (session('success'))

        <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Todo List --}}
    @if ($todos->count())

        <div class="space-y-4">

            @foreach ($todos as $todo)

                <div
                    class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm"
                >

                    <div class="flex items-start justify-between">

                        <div>

                            <h2 class="text-lg font-semibold text-gray-900">
                                {{ $todo->title }}
                            </h2>

                            @if ($todo->description)

                                <p class="mt-2 text-gray-600">
                                    {{ $todo->description }}
                                </p>

                            @endif

                            <p class="mt-3 text-sm text-gray-500">
                                Deleted at:
                                {{ $todo->deleted_at->format('d/m/Y H:i') }}
                            </p>

                        </div>


                        {{-- Actions --}}
                        <div style="display: flex !important; gap: 12px !important; align-items: center !important;">

    {{-- Restore --}}
    <form
        action="{{ route('todos.restore', ['id' => $todo->id]) }}"
        method="POST"
        style="display: block !important;"
    >
        @csrf
        @method('PATCH')

        <button
            type="submit"
            style="
                display: inline-block !important;
                visibility: visible !important;
                opacity: 1 !important;
                background-color: #16a34a !important;
                color: white !important;
                padding: 8px 16px !important;
                border-radius: 8px !important;
                border: none !important;
                cursor: pointer !important;
            "
        >
            Restore
        </button>
    </form>


    {{-- Force Delete --}}
    <form
        action="{{ route('todos.forceDelete', ['id' => $todo->id]) }}"
        method="POST"
        style="display: block !important;"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            style="
                display: inline-block !important;
                visibility: visible !important;
                opacity: 1 !important;
                background-color: #dc2626 !important;
                color: white !important;
                padding: 8px 16px !important;
                border-radius: 8px !important;
                border: none !important;
                cursor: pointer !important;
            "
        >
            Delete
        </button>
    </form>

</div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Pagination --}}
        <div class="mt-8">
            {{ $todos->links() }}
        </div>

    @else

        <div class="rounded-xl border border-gray-200 bg-white p-12 text-center">

            <h2 class="text-xl font-semibold">
                Trash is empty
            </h2>

            <p class="mt-2 text-gray-500">
                There are no deleted todos.
            </p>

        </div>

    @endif

</div>

@endsection