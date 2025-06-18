<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WMSU Guidance Office</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="logo-container">
                <img src="/logo.png" alt="WMSU Logo" class="wmsu-logo">
            </div>
            <h1 class="university-name">Western Mindanao State University</h1>
            <h2 class="system-name">Guidance Office Management System</h2>
            <p class="description">Empowering student success through guidance, counseling, and support services.</p>
            <footer class="footer">&copy; 2025 WMSU Guidance Office</footer>
        </div>
        <div class="login-right">
            <div class="login-form-container">
                <h2 class="welcome-title">Welcome back!</h2>
                <p class="welcome-desc">Please enter your details to sign in to your account</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="input-error" />
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="input-error" />
                    </div>
                    <div class="form-group remember-me">
                        <label for="remember_me" class="checkbox-label">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <button type="submit" class="sign-in-btn">Sign In</button>
                    @if (Route::has('password.request'))
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- Animated Logo Overlay -->
    <div id="logo-overlay" class="logo-overlay" style="display:none;">
        <div class="overlay-content">
            <img src="/logo.png" alt="WMSU Logo" class="overlay-logo left-logo">
            <span class="overlay-x">X</span>
            <img src="/ccs_logo.jpg" alt="CCS Logo" class="overlay-logo right-logo">
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.login-form-container form');
            const overlay = document.getElementById('logo-overlay');
            if (form && overlay) {
                form.addEventListener('submit', function(e) {
                    overlay.style.display = 'flex';
                    setTimeout(() => {
                        overlay.classList.add('fade-in');
                    }, 10);
                });
            }
        });
    </script>
</body>
</html>
