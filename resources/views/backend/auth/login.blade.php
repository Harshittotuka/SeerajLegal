<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/login/login.css') }}">
    <style>
        .clock {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 36px;
            font-weight: 600;
            font-family: Arial, sans-serif;
            color: #fff;
            padding: 5px 15px;
            border-radius: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hidden {
            display: none;
        }

        .forgot-password a {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .alert {
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .alert-danger {
            background-color: #f8d7da39;
            color: #ff0015;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        /* Shake Animation */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        @keyframes borderFlash {
            0% {
                border: 2px solid red;
            }

            100% {
                border: 2px solid rgba(255, 255, 255, 0.123);
            }
        }

        .shake {
            animation: shake 0.6s ease-in-out 2, borderFlash 1s ease-in-out forwards;
        }
    </style>
</head>

<body>
    <!-- Clock -->
    <div class="clock" id="clock"></div>

    <div id="loginWrapper" class="wrapper {{ session('login_error') ? 'shake' : '' }}">
        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <h2>Login</h2>

            @if (session('login_error'))
                <div class="alert alert-danger">
                    {{ session('login_error') }}
                </div>
            @endif

            <!-- Email Input -->
            <div class="input-field">
                <input type="text" name="email" required value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                <label>Enter your email</label>
            </div>

            <!-- Password Input -->
            <div class="input-field">
                <input type="password" name="password" required
                    class="form-control @error('password') is-invalid @enderror">
                <label>Enter your password</label>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <p>Remember me</p>
                </label>
                <a href="#" onclick="showForgotPassword()">Forgot password?</a>
            </div>

            <button type="submit">Log In</button>
        </form>

        <!-- Forgot Password Form -->
        <form id="forgotPasswordForm" class="hidden" method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <h2>Forgot Password</h2>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->has('email') && session('forgot_form'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif


            <div class="input-field">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <button type="submit">Send Reset Link</button>
            <div class="forgot-password">
                <a href="#" onclick="showLogin()">Back to Login</a>
            </div>
        </form>
    </div>

    <!-- JavaScript for Clock & Switching Forms -->
    <script>
        function updateClock() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            document.getElementById('clock').innerText = `${hours}:${minutes}:${seconds} ${ampm}`;
        }

        setInterval(updateClock, 1000);
        updateClock();

        function showForgotPassword() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('forgotPasswordForm').classList.remove('hidden');
        }

        function showLogin() {
            document.getElementById('forgotPasswordForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
        }

        // Remove shake class after 3 seconds if applied
    window.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('loginWrapper');

    @if (session('forgot_form'))
        showForgotPassword();
    @else
        showLogin(); // ✅ Force redirect to login form on success
    @endif

    if (wrapper.classList.contains('shake')) {
        setTimeout(() => {
            wrapper.classList.remove('shake');
        }, 3000);
    }
});

    </script>

    <!-- Toastify only for success messages -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
@if (session('toast_success'))
    Toastify({
        text: "{{ session('toast_success') }}",
        duration: 3000,
        gravity: "top",
        position: "right",
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    }).showToast();
@endif


    </script>

</body>

</html>
