<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Join Group - Todo App</title>

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

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 25px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;

            box-shadow:
                0 8px 25px
                rgba(0, 100, 100, 0.08);
        }

        h1 {
            font-size: 28px;
            color: #111827;
            margin-bottom: 10px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;

            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        input {
            width: 100%;
            height: 45px;

            padding: 0 14px;

            border: 1px solid #d7eeee;
            border-radius: 8px;

            outline: none;

            font-size: 14px;
        }

        input:focus {
            border-color: #15b5bc;

            box-shadow:
                0 0 0 3px
                rgba(21, 181, 188, 0.1);
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .alert {
            background: #fee2e2;
            color: #dc2626;

            padding: 12px 15px;

            border-radius: 8px;

            font-size: 13px;

            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;

            height: 42px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: bold;

            cursor: pointer;

            text-decoration: none;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .join-btn {
            background: #15b5bc;
            color: white;
            border: none;
        }

        .join-btn:hover {
            background: #0d9da4;
        }

        .back-btn {
            background: white;
            color: #0faab1;

            border: 1px solid #15b5bc;
        }

        .back-btn:hover {
            background: #e5f8f8;
        }

    </style>

</head>

<body>

<div class="container">
    <div class="card">

        <h1>
            Create a Group
        </h1>

        <p class="description">
            Create your group and share your task.
        </p>

        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <form
            action="{{ route('groups.create') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label for="name">
                    Group Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter group name..."
                    required
                >


            </div>
            <div class="actions">
                <a
                    href="{{ route('groups.index') }}"
                    class="btn back-btn"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="btn join-btn"
                >
                    Create Group
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>