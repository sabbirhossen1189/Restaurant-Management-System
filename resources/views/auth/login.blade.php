<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login – The Velvet Spoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .font-display {
            font-family: 'Cormorant Garamond', serif;
        }

        .auth-bg {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1208 50%, #0f0f0f 100%);
        }

        .gold {
            color: #c9a84c;
        }

        .gold-border {
            border-color: #c9a84c;
        }

        .gold-bg {
            background-color: #c9a84c;
        }

        .form-input {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(201, 168, 76, 0.25);
            color: #e8dcc8;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            transition: all 0.2s;
            outline: none;
        }

        .form-input::placeholder {
            color: rgba(232, 220, 200, 0.35);
        }

        .form-input:focus {
            border-color: rgba(201, 168, 76, 0.7);
            background: rgba(255, 255, 255, 0.07);
            box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.1);
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(201, 168, 76, 0.7);
            margin-bottom: 0.4rem;
        }

        .btn-gold {
            width: 100%;
            background: linear-gradient(135deg, #c9a84c, #a8873a);
            color: #0f0f0f;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 0.875rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.25s;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #dbb95c, #c9a84c);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(201, 168, 76, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(201, 168, 76, 0.2);
        }

        .error-list {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
        }

        .error-list li {
            color: #fca5a5;
            font-size: 0.8rem;
            list-style: disc;
            margin-left: 1rem;
        }
    </style>
</head>

<body class="auth-bg min-h-screen flex items-center justify-center p-4">

    {{-- Ambient background orbs --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div
            style="position:absolute;top:20%;left:15%;width:400px;height:400px;background:radial-gradient(circle,rgba(201,168,76,0.06) 0%,transparent 70%);border-radius:50%;">
        </div>
        <div
            style="position:absolute;bottom:20%;right:15%;width:300px;height:300px;background:radial-gradient(circle,rgba(201,168,76,0.04) 0%,transparent 70%);border-radius:50%;">
        </div>
    </div>

    <div style="width:100%;max-width:440px;position:relative;z-index:10;">

        {{-- Logo / Branding --}}
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-block">
                <div class="font-display text-4xl gold" style="letter-spacing:0.08em;">The Velvet Spoon</div>
                <div
                    style="font-size:0.65rem;letter-spacing:0.25em;text-transform:uppercase;color:rgba(201,168,76,0.5);margin-top:2px;">
                    Fine Dining</div>
            </a>
        </div>

        {{-- Card --}}
        <div
            style="background:rgba(15,15,15,0.8);backdrop-filter:blur(20px);border:1px solid rgba(201,168,76,0.15);border-radius:12px;padding:2.5rem;">

            <h1 class="font-display text-white"
                style="font-size:1.8rem;font-weight:300;letter-spacing:0.04em;margin-bottom:0.25rem;">Welcome Back</h1>
            <p style="font-size:0.8rem;color:rgba(232,220,200,0.45);margin-bottom:1.75rem;">Sign in to continue your
                dining experience</p>

            {{-- Validation Errors --}}
            @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            {{-- Session Status --}}
            @if (session('status'))
            <div
                style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.3);border-radius:6px;padding:0.75rem 1rem;margin-bottom:1.25rem;">
                <p style="color:#86efac;font-size:0.8rem;">{{ session('status') }}</p>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom:1.25rem;">
                    <label class="form-label" for="email">Email Address</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required
                        autofocus placeholder="you@example.com">
                </div>

                <div style="margin-bottom:1rem;">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required
                        placeholder="••••••••">
                </div>

                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.75rem;">
                    <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                        <input type="checkbox" name="remember" id="remember_me"
                            style="accent-color:#c9a84c;width:14px;height:14px;">
                        <span style="font-size:0.8rem;color:rgba(232,220,200,0.5);">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        style="font-size:0.8rem;color:rgba(201,168,76,0.7);text-decoration:none;"
                        onmouseover="this.style.color='#c9a84c'"
                        onmouseout="this.style.color='rgba(201,168,76,0.7)'">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-gold">Sign In</button>

                <div class="divider">
                    <span
                        style="font-size:0.7rem;color:rgba(232,220,200,0.3);letter-spacing:0.06em;white-space:nowrap;">New
                        to The Velvet Spoon?</span>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}"
                        style="font-size:0.85rem;color:rgba(201,168,76,0.8);text-decoration:none;letter-spacing:0.03em;"
                        onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='rgba(201,168,76,0.8)'">
                        Create an Account →
                    </a>
                </div>
            </form>
        </div>

        {{-- Footer --}}
        <p class="text-center" style="font-size:0.7rem;color:rgba(232,220,200,0.2);margin-top:1.5rem;">
            &copy; {{ date('Y') }} The Velvet Spoon. All rights reserved.
        </p>
    </div>

</body>

</html>