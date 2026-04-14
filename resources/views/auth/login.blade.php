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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .auth-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            overflow-y: auto;
        }
        .auth-card {
            border: 0;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        }
        .auth-card .card-body {
            padding: 3rem;
        }
        .auth-banner {
            background: linear-gradient(135deg, #2f70ff 0%, #0a8cff 100%);
            min-height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 3rem;
        }
        .auth-banner-content {
            max-width: 90%;
        }
        .auth-banner h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }
        .auth-banner p {
            font-size: 1rem;
            opacity: 0.95;
            color: white;
            line-height: 1.5;
        }
        .auth-banner-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
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
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }
        .auth-card .form-control {
            border-radius: 12px;
            padding: 0.85rem 1.1rem;
            border: 1px solid #e0e0e0;
            font-size: 0.95rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .auth-card .form-control:focus {
            border-color: #2f70ff;
            box-shadow: 0 0 0 0.2rem rgba(47, 112, 255, 0.15);
        }
        .auth-card .form-label {
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }
        .auth-card .btn-primary {
            border-radius: 12px;
            padding: 0.95rem 1.8rem;
            font-weight: 600;
            background: linear-gradient(135deg, #2f70ff 0%, #0a8cff 100%);
            border: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .auth-card .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(47, 112, 255, 0.3);
        }
        .auth-card .btn-primary:active {
            transform: translateY(0);
        }
        .auth-card a {
            color: #2f70ff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .auth-card a:hover {
            color: #0a8cff;
            text-decoration: underline;
        }
        .auth-note {
            font-size: 0.95rem;
            color: #6c757d;
        }
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            border-radius: 0.35em;
            border: 2px solid #e0e0e0;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #2f70ff;
            border-color: #2f70ff;
        }
        .form-check-label {
            margin-bottom: 0;
            cursor: pointer;
            color: #6c757d;
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #fff5f5;
            color: #d32f2f;
        }
        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }
        .d-flex.justify-content-between {
            flex-wrap: wrap;
            gap: 1rem;
        }
        @media (max-width: 768px) {
            .auth-card .card-body {
                padding: 2rem;
            }
            .auth-card h2 {
                font-size: 1.5rem;
            }
            .auth-section {
                padding: 20px 15px;
            }
            .auth-banner {
                padding: 2rem;
            }
            .auth-banner h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-10">
                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-block auth-banner">
                            <div class="auth-banner-content">
                                <div class="auth-banner-icon">
                                    🍽️
                                </div>
                                <h3>Welcome Back!</h3>
                                <p>Access your restaurant management dashboard to manage orders, food items, reservations, and more.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <div class="auth-brand mx-auto">
                                        <img src="{{ asset('admin/img/admin-logo.png') }}" alt="Logo">
                                    </div>
                                    <p class="text-uppercase text-primary mb-2" style="font-weight: 700; font-size: 1rem;">The Velvet Spoon</p>
                                    <h2>Sign In</h2>
                                    <p class="text-muted">Enter your credentials to access your account</p>
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
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Enter your password">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                            <label class="form-check-label" for="remember_me">Remember me</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" style="font-size: 0.95rem;">Forgot password?</a>
                                        @endif
                                    </div>

                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                                    </div>
                                </form>

                                <div class="text-center auth-note">
                                    Don't have an account? <a href="{{ route('register') }}">Create one now</a>
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
