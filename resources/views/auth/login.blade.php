<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Todo App</title>

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
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f2937;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: #15b5bc;
            border-radius: 12px;
            color: white;
            font-size: 40px;
            font-weight: bold;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;
        }

        .logo h1 {
            color: #13aeb5;
            font-size: 28px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;

            box-shadow:
                0 10px 30px rgba(0, 100, 100, 0.12);
        }

        .card h2 {
            text-align: center;
            font-size: 28px;
            color: #111827;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 15px;
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
            height: 48px;
            padding: 0 15px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-size: 15px;
            outline: none;

            transition: 0.2s;
        }

        input:focus {
            border-color: #15b5bc;
            box-shadow: 0 0 0 3px rgba(21, 181, 188, 0.12);
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .remember input {
            width: 16px;
            height: 16px;
        }

        .remember label {
            margin: 0;
            font-weight: normal;
        }

        .forgot {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot a {
            color: #0faab1;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 8px;

            background: #15b5bc;
            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0d9da4;
        }

        .register {
            text-align: center;
            margin-top: 25px;
            color: #6b7280;
            font-size: 14px;
        }

        .register a {
            color: #0faab1;
            text-decoration: none;
            font-weight: bold;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .back {
            text-align: center;
            margin-top: 20px;
        }

        .back a {
            color: #64748b;
            font-size: 14px;
            text-decoration: none;
        }

        .back a:hover {
            color: #0faab1;
        }

        @media (max-width: 500px) {

            .card {
                padding: 30px 25px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="logo">

        <div class="logo-icon">
            ✓
        </div>

        <h1>Todo App</h1>

    </div>


    <div class="card">

        <h2>Welcome Back</h2>

        <p class="subtitle">
            Log in to manage your tasks and stay organized.
        </p>


        <!-- Session Status -->

        @if (session('status'))
            <div class="error">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}">

            @csrf


            <!-- Email -->

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Enter your email"
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Password -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                >

                @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- Remember -->

            <div class="remember">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                >

                <label for="remember_me">
                    Remember me
                </label>

            </div>


            <!-- Forgot Password -->

            @if (Route::has('password.request'))

                <div class="forgot">

                    <a href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>

                </div>

            @endif


            <!-- Login -->

            <button type="submit" class="btn">
                Log In
            </button>

        </form>


        <!-- Register -->

        <div class="register">

            Don't have an account?

            <a href="{{ route('register') }}">
                Create an account
            </a>

        </div>

    </div>


    <div class="back">

        <a href="{{ url('/') }}">
            ← Back to Todo App
        </a>

    </div>

</div>

</body>
</html>