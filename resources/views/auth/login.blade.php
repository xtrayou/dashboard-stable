<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard DISKOMINFO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --danger-color: #dc2626;
            --success-color: #059669;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .login-right {
            padding: 60px 40px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .logo h2 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo p {
            color: #6b7280;
            margin: 0;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-floating>.form-control {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-floating>.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        .form-floating>label {
            color: #6b7280;
            font-weight: 500;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .custom-checkbox input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .custom-checkbox label {
            color: #6b7280;
            font-weight: 500;
            margin: 0;
            cursor: pointer;
        }

        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 25px;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert-success {
            background-color: #f0fdf4;
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .features {
            position: relative;
            z-index: 1;
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .feature-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .login-left {
                display: none;
            }

            .login-right {
                padding: 40px 30px;
            }

            .logo h2 {
                font-size: 1.5rem;
            }
        }

        .loading {
            display: none;
        }

        .btn-login.loading .loading {
            display: inline-block;
        }

        .btn-login.loading .btn-text {
            display: none;
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-elements::before {
            width: 100px;
            height: 100px;
            top: 20%;
            right: 20%;
            animation-delay: -2s;
        }

        .floating-elements::after {
            width: 60px;
            height: 60px;
            bottom: 30%;
            left: 10%;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="row g-0">
                <!-- Left Panel -->
                <div class="col-md-6 login-left">
                    <div class="floating-elements"></div>
                    <div class="welcome-text">
                        <h3>Selamat Datang!</h3>
                        <p>Akses dashboard admin untuk mengelola domain dan infrastruktur digital Kabupaten Purwakarta dengan mudah dan efisien.</p>
                    </div>

                    <div class="features">
                        <div class="feature-item">
                            <i class="fas fa-chart-line"></i>
                            <span>Monitor performa real-time</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Keamanan tingkat enterprise</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-cogs"></i>
                            <span>Manajemen domain terpusat</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Responsive di semua device</span>
                        </div>
                    </div>
                </div>

                <!-- Right Panel -->
                <div class="col-md-6 login-right">
                    <div class="logo">
                        <i class="fas fa-shield-alt"></i>
                        <h2>Admin Dashboard</h2>
                        <p>DISKOMINFO Purwakarta</p>
                    </div>

                    <!-- Alert Messages -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Oops!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="form-floating">
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="name@example.com"
                                value="{{ old('email') }}"
                                required>
                            <label for="email">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                        </div>

                        <div class="form-floating">
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Password"
                                required>
                            <label for="password">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                        </div>

                        <div class="custom-checkbox">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Ingat saya selama 30 hari</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login">
                            <span class="btn-text">
                                <i class="fas fa-sign-in-alt me-2"></i>Masuk Dashboard
                            </span>
                            <span class="loading">
                                <i class="fas fa-spinner fa-spin me-2"></i>Memproses...
                            </span>
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="text-muted mb-2">
                            <i class="fas fa-info-circle me-1"></i>
                            Akun Default untuk Testing
                        </p>
                        <small class="text-muted">
                            Email: <strong>admin@diskominfo.go.id</strong><br>
                            Password: <strong>admin123</strong>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form submission dengan loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.btn-login');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Auto-enable button setelah 10 detik (fallback)
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            }, 10000);
        });

        // Auto-hide alerts setelah 5 detik
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // Quick fill untuk testing (hanya development)
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');

            // Double click untuk auto-fill (hanya untuk development)
            if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
                emailField.addEventListener('dblclick', function() {
                    emailField.value = 'admin@diskominfo.go.id';
                    passwordField.value = 'admin123';
                    document.getElementById('remember').checked = true;
                });
            }
        });
    </script>
</body>

</html>