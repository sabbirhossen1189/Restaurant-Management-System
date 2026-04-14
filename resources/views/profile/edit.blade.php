@extends('layouts.app')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }
    
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .profile-container {
        max-width: 700px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .profile-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 3rem 2rem;
        color: white;
        margin-bottom: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }

    .profile-header h1 {
        font-size: 2.2rem;
        margin: 0;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }

    .profile-content {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        display: block;
        font-size: 0.95rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input {
        width: 100%;
        padding: 1rem 1.2rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        font-family: inherit;
        color: #2d3748;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-input::placeholder {
        color: #a0aec0;
    }

    textarea.form-input {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
    }

    .error-message {
        color: #f56565;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .error-message::before {
        content: '⚠️';
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .btn {
        flex: 1;
        padding: 1rem;
        border: 2px solid transparent;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6);
    }

    .btn-secondary {
        background: white;
        color: #667eea;
        border-color: #667eea;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .btn-secondary:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .success-message {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .success-message::before {
        content: '✓';
        font-weight: bold;
    }

    .form-hint {
        font-size: 0.85rem;
        color: #718096;
        margin-top: 0.5rem;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .profile-header {
            padding: 2rem 1.5rem;
        }

        .profile-header h1 {
            font-size: 1.8rem;
        }

        .profile-content {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <h1>✏️ Edit Profile</h1>
    </div>

    <div class="profile-content">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.profile.update') }}">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">📝 Full Name</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" placeholder="Enter your full name" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">📧 Email Address</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" placeholder="Enter your email address" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="form-hint">We'll use this email for account notifications and password recovery</div>
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">📱 Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone', $user->phone ?? '') }}" placeholder="e.g., +1 (555) 123-4567">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="form-hint">Include country code for international numbers</div>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">📍 Address</label>
                <textarea id="address" name="address" class="form-input" placeholder="Enter your street address, city, state, and zip code">{{ old('address', $user->address ?? '') }}</textarea>
                @error('address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="form-hint">This address will be used for order delivery</div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    💾 Save Changes
                </button>
                <a href="{{ route('user.profile.show') }}" class="btn btn-secondary">
                    ⬅️ Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection