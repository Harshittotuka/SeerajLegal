<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism Login Form</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/login/login.css') }}">
    <style>
        /* Professional Clock Styling */
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
        /* Adjusting the Back to Login spacing */
        .forgot-password a {
            display: block;
            text-align: center;
            margin-top: 15px; /* Added space */
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Clock -->
    <div class="clock" id="clock"></div>

    <div class="wrapper">
        <!-- Login Form -->
        <form id="loginForm">
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" required>
                <label>Enter your email</label>
            </div>
            <div class="input-field">
                <input type="password" required>
                <label>Enter your password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember">
                    <p>Remember me</p>
                </label>
                <a href="#" onclick="showForgotPassword()">Forgot password?</a>
            </div>
            <button type="submit">Log In</button>
        </form>

        <!-- Forgot Password Form -->
        <form id="forgotPasswordForm" class="hidden">
            <h2>Forgot Password</h2>
            <div class="input-field">
                <input type="text" placeholder="Enter your Email/Phone" required>
            </div>
            <button type="submit">Reset Password</button>
            <div class="forgot-password">
                <a href="#" onclick="showLogin()">Back to Login</a>
            </div>
        </form>
    </div>

    <!-- JavaScript for Live Clock & Form Switching -->
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
    </script>
</body>
</html>
