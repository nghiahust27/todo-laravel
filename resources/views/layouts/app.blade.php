<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        @yield('title', 'Todo App')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                {{-- Logo --}}
                <a
                    href="{{ route('todos.index') }}"
                    class="text-xl font-bold text-blue-600"
                >
                    Todo App
                </a>

                {{-- User --}}
                @auth
                    <div class="flex items-center gap-4">

                        <span class="text-gray-600">
                            Hello,
                            <strong>
                                {{ auth()->user()->name }}
                            </strong>
                        </span>

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="text-red-600 hover:text-red-800"
                            >
                                Logout
                            </button>
                        </form>

                    </div>
                @endauth

            </div>

        </div>
    </nav>


    {{-- Main content --}}
    <main class="max-w-7xl mx-auto px-6 py-8">

        {{-- Success message --}}
        @if (session('success'))

            <div
                class="mb-6 rounded-lg bg-green-100
                       border border-green-300
                       px-4 py-3 text-green-800"
            >
                {{ session('success') }}
            </div>

        @endif


        {{-- Error message --}}
        @if (session('error'))

            <div
                class="mb-6 rounded-lg bg-red-100
                       border border-red-300
                       px-4 py-3 text-red-800"
            >
                {{ session('error') }}
            </div>

        @endif


        @yield('content')

    </main>

</body>

</html>