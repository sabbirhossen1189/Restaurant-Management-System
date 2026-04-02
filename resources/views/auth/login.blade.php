<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Restaurant Management</title>
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/foodhut.css') }}">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f6fa 0%, #e8f1ff 100%);
        }
        .auth-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        .auth-card {
            border: 0;
            border-radius: 24px;
            overflow: hidden;
        }
        .auth-card .card-body {
            padding: 3rem;
        }
        .auth-banner {
            background: url('{{ asset('assets/imgs/main.jpg') }}') center/cover no-repeat;
            min-height: 100%;
            position: relative;
        }
        .auth-banner::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
        }
        .auth-card .auth-brand {
            width: 88px;
            height: 88px;
            border-radius: 18px;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 24px 48px rgba(15, 23, 42, 0.08);
            margin-bottom: 1rem;
        }
        .auth-card .auth-brand img {
            width: 60px;
            height: auto;
        }
        .auth-card h2 {
            font-weight: 700;
            margin-bottom: 0.75rem;
        }
        .auth-card .form-control {
            border-radius: 12px;
            padding: 1rem 1.1rem;
        }
        .auth-card .btn-primary {
            border-radius: 12px;
            padding: 0.95rem 1.8rem;
        }
        .auth-card a {
            color: #2f70ff;
        }
        .auth-note {
            font-size: 0.95rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card auth-card shadow-lg">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block auth-banner"></div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="auth-brand mx-auto">
                                        <img src="{{ asset('admin/img/admin-logo.png') }}" alt="Logo">
                                    </div>
                                    <p class="text-uppercase text-primary mb-2">The Velvet Spoon</p>
                                    <h2>Welcome Back</h2>
                                    <p class="text-muted">Login with your account to manage orders, food items and reservations.</p>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                            <label class="form-check-label" for="remember_me">Remember me</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot password?</a>
                                        @endif
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Log In</button>
                                    </div>
                                </form>

                                <div class="text-center mt-4 auth-note">
                                    Don't have an account? <a href="{{ route('register') }}">Register now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
