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
        max-width: 1000px;
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

    .profile-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        border: 3px solid rgba(255, 255, 255, 0.5);
        flex-shrink: 0;
    }

    .profile-header-text h1 {
        font-size: 2rem;
        margin: 0 0 0.5rem 0;
        font-weight: 700;
    }

    .profile-header-text p {
        margin: 0.3rem 0;
        opacity: 0.9;
        font-size: 1rem;
    }

    .profile-actions {
        margin-top: 2rem;
    }

    .btn {
        display: inline-block;
        padding: 0.7rem 1.8rem;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-right: 1rem;
        margin-bottom: 0.5rem;
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
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 2px solid #667eea;
    }

    .btn-secondary:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
    }

    .btn-danger {
        background: #ff6b6b;
        color: white;
        font-size: 0.9rem;
        padding: 0.5rem 1.2rem;
    }

    .btn-danger:hover {
        background: #ff5252;
        transform: translateY(-1px);
    }

    .profile-content {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #667eea;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title::before {
        content: '';
        display: inline-block;
        width: 5px;
        height: 5px;
        background: #667eea;
        border-radius: 50%;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-item {
        background: linear-gradient(135deg, #f5f7fa 0%, #f0f1f4 100%);
        padding: 1.5rem;
        border-radius: 12px;
        border-left: 4px solid #667eea;
    }

    .info-label {
        font-size: 0.85rem;
        color: #718096;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .info-value {
        font-size: 1.1rem;
        color: #2d3748;
        font-weight: 600;
        word-break: break-word;
    }

    .history-item {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        border-left: 4px solid #764ba2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .history-item:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .history-info {
        flex: 1;
    }

    .history-title {
        font-weight: 700;
        color: #2d3748;
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
    }

    .history-date {
        color: #718096;
        font-size: 0.9rem;
    }

    .status-badge {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        margin: 0 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #718096;
    }

    .empty-state-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .success-message {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
    }

    .actions-row {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    @media (max-width: 768px) {
        .profile-header {
            padding: 2rem 1.5rem;
        }

        .profile-header-content {
            flex-direction: column;
            text-align: center;
        }

        .profile-content {
            padding: 1.5rem;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .history-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-header-text h1 {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .actions-row {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            margin-right: 0;
        }
    }
</style>

<div class="profile-container">
    @if(session('success'))
        <div class="success-message">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="profile-header-content">
            <div class="profile-avatar">👤</div>
            <div class="profile-header-text">
                <h1>{{ $user->name }}</h1>
                <p>📧 {{ $user->email }}</p>
                <p>📱 {{ $user->phone ?? 'No phone added' }}</p>
            </div>
        </div>
        <div class="profile-actions">
            <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">✏️ Edit Profile</a>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="profile-content">
        <div class="section-title">📋 Personal Information</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Full Name</div>
                <div class="info-value">{{ $user->name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email Address</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Phone Number</div>
                <div class="info-value">{{ $user->phone ?? 'Not provided' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Address</div>
                <div class="info-value">{{ $user->address ?? 'Not provided' }}</div>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="profile-content">
        <div class="section-title">🛒 Order History</div>
        @if($orders->count())
            @foreach($orders as $order)
                <div class="history-item">
                    <div class="history-info">
                        <div class="history-title">Order #{{ $order->id }}</div>
                        <div class="history-date">📅 {{ $order->created_at->format('F j, Y') }}</div>
                    </div>
                    <div>
                        <span class="status-badge">{{ ucfirst($order->delivery_status) }}</span>
                        @if($order->delivery_status !== 'delivered' && $order->delivery_status !== 'canceled')
                            <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger">Cancel</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🛍️</div>
                <p>No orders yet. Start ordering from our delicious menu!</p>
            </div>
        @endif
    </div>

    <!-- Cart History -->
    <div class="profile-content">
        <div class="section-title">🛒 Cart History</div>
        @if($carts->count())
            @foreach($carts as $cart)
                <div class="history-item">
                    <div class="history-info">
                        <div class="history-title">Cart #{{ $cart->id }}</div>
                        <div class="history-date">📅 {{ $cart->created_at->format('F j, Y') }}</div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <div class="empty-state-icon">🛒</div>
                <p>Your cart history is empty. Start shopping today!</p>
            </div>
        @endif
    </div>

    <!-- Booking History -->
    <div class="profile-content">
        <div class="section-title">🍽️ Table Bookings</div>
        @if($bookings->count())
            @foreach($bookings as $booking)
                <div class="history-item">
                    <div class="history-info">
                        <div class="history-title">Booking #{{ $booking->id }}</div>
                        <div class="history-date">📅 {{ $booking->date }} at {{ $booking->time }} • 👥 {{ $booking->guest }} guests</div>
                    </div>
                    <div class="actions-row">
                        <span class="status-badge">📞 {{ $booking->phone }}</span>
                        <a href="{{ url('cancel_booking', $booking->id) }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <div class="empty-state-icon">📅</div>
                <p>No table bookings yet. Reserve a table for your next visit!</p>
            </div>
        @endif
    </div>
</div>

@endsection