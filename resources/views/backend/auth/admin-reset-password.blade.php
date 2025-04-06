<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Admin Password</title>
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

        .wrapper {
            margin-top: 60px;
        }

        .forgot-password a {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
            color: #fff;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
        }
    </style>
</head>

<body>

    <div class="clock" id="clock"></div>

    <div class="wrapper">
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-field">
                <input type="email" name="email" value="{{ $email ?? old('email') }}" required readonly
                    onfocus="blur()" style="user-select: none; pointer-events: none; color: #6c757d;">
                <label>Email</label>
            </div>

            <div class="input-field">
                <input type="password" name="password" required>
                <label>New Password</label>
            </div>

            <div class="input-field">
                <input type="password" name="password_confirmation" required>
                <label>Confirm Password</label>
            </div>

            <button type="submit">Reset Password</button>
            <div class="forgot-password">
                <a href="{{ route('login') }}">Back to Login</a>
            </div>
        </form>

    </div>

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
    </script>

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

        @if ($errors->any())
            Toastify({
                text: "{{ $errors->first() }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
            }).showToast();
        @endif
    </script>

</body>

</html>
