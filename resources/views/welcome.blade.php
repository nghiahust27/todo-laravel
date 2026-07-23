<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to Todo App</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            color: #1f2937;
            background: #e8fafa;
            overflow-x: hidden;
        }

        /* ================= HEADER ================= */

        header {
            height: 80px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 55px;
            border-bottom: 1px solid #d7eeee;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #13aeb5;
            font-size: 28px;
            font-weight: bold;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #16b6bd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        nav a {
            text-decoration: none;
            color: #374151;
            font-size: 16px;
        }

        nav a:hover {
            color: #12adb4;
        }

        .nav-login {
            border: 1px solid #12adb4;
            color: #12adb4 !important;
            padding: 12px 28px;
            border-radius: 8px;
        }

        .nav-signup {
            background: #12adb4;
            color: white !important;
            padding: 13px 28px;
            border-radius: 8px;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: calc(100vh - 80px);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 45px;
        }

        /* Background waves */

        .wave {
            position: absolute;
            width: 120%;
            height: 250px;
            left: -10%;
            border-radius: 50%;
            transform: rotate(-5deg);
            z-index: 0;
        }

        .wave-1 {
            top: 430px;
            background: #a5e9e8;
        }

        .wave-2 {
            top: 510px;
            background: #64d2d3;
        }

        .wave-3 {
            top: 600px;
            background: #c9f4f3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-icon {
            width: 70px;
            height: 70px;
            background: #15b5bc;
            border-radius: 12px;
            color: white;
            font-size: 48px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
        }

        h1 {
            font-size: 58px;
            color: #111827;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 24px;
            color: #4b5563;
            margin-bottom: 25px;
        }

        /* ================= TODO IMAGE ================= */

        .todo-image {
            width: 260px;
            height: 300px;
            margin: 0 auto 25px;

            background: white;
            border-radius: 18px;

            box-shadow:
                10px 15px 25px rgba(0, 100, 100, 0.25);

            transform: rotate(8deg);

            display: flex;
            flex-direction: column;
            align-items: center;

            overflow: hidden;
        }

        .todo-header {
            width: 100%;
            height: 55px;
            background: #25b9bd;
        }

        .todo-list {
            width: 80%;
            margin-top: 30px;
        }

        .todo-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .check {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            background: #8ce1df;
            color: #078b91;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
            font-weight: bold;
        }

        .line {
            width: 120px;
            height: 12px;
            border-radius: 10px;
            background: #9bdfdf;
        }

        /* ================= BUTTONS ================= */

        .actions {
            width: 380px;
            position: relative;
            
            z-index: 5;
        }

        .btn {
            width: 100%;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;

            margin-bottom: 15px;
        }

        .btn-primary {
            background: #14b4bb;
            color: white;
        }

        .btn-primary:hover {
            background: #0d9da4;
        }

        .btn-secondary {
            border: 1px solid #14b4bb;
            color: #0faab1;
            background: rgba(255, 255, 255, 0.5);
        }

        .btn-secondary:hover {
            background: white;
        }

        .account-text {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .account-text a {
            color: #0faab1;
            text-decoration: none;
        }

        /* ================= FOOTER ================= */

        footer {
            position: relative;
            z-index: 5;
            margin-top: 40px;
            padding-bottom: 25px;
            color: #64748b;
            font-size: 14px;
        }

        footer a {
            color: #0faab1;
            text-decoration: none;
            margin: 0 8px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 768px) {

            header {
                padding: 0 20px;
            }

            nav a:not(.nav-login):not(.nav-signup) {
                display: none;
            }

            h1 {
                font-size: 40px;
            }

            .subtitle {
                font-size: 18px;
            }

            .actions {
                
                width: 85%;
            }

            .logo {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <header>

        <div class="logo">
            <div class="logo-icon">✓</div>
            Todo App
        </div>

        <nav>


            <a href="{{ route('login') }}" class="nav-login">
                Log In
            </a>

            <a href="{{ route('register') }}" class="nav-signup">
                Sign Up
            </a>
        </nav>

    </header>


    <!-- HERO -->

    <main class="hero">

        <!-- Background -->

        <div class="wave wave-1"></div>
        <div class="wave wave-2"></div>
        <div class="wave wave-3"></div>


        <div class="hero-content">

            <!-- Icon -->

            <div class="hero-icon">
                ✓
            </div>


            <!-- Title -->

            <h1>
                Welcome to Todo App
            </h1>

            <p class="subtitle">
                Organize your life. Achieve your goals. One step at a time.
            </p>


            <!-- Todo Illustration -->

            <div class="todo-image">

                <div class="todo-header"></div>

                <div class="todo-list">

                    <div class="todo-item">
                        <div class="check">✓</div>
                        <div class="line"></div>
                    </div>

                    <div class="todo-item">
                        <div class="check">✓</div>
                        <div class="line"></div>
                    </div>

                    <div class="todo-item">
                        <div class="check">✓</div>
                        <div class="line"></div>
                    </div>

                </div>

            </div>


            <!-- Buttons -->

            <div class="actions">

                <a
                    href="{{ route('register') }}"
                    class="btn btn-primary"
                >
                    Get Started (Sign Up)
                </a>

                <a
                    href="{{ route('login') }}"
                    class="btn btn-secondary"
                >
                    Log In
                </a>

                

            </div>

        </div>


    </main>

</body>
</html>