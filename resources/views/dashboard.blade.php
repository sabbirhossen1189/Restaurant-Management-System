<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                    <div class="space-y-3">
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-indigo-600">Welcome back</p>
                        <h1 class="text-3xl font-semibold text-slate-900">Hi, {{ $user->name }}</h1>
                        <p class="max-w-2xl text-sm leading-6 text-slate-600">
                            Your restaurant dashboard is ready. Review your latest orders, cart activity, and profile details from one place.
                        </p>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-2 xl:auto-cols-auto">
                        <a href="{{ route('my_cart') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            View Cart
                        </a>
                        <a href="{{ route('user.profile.show') }}" class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500">
                            Update Profile
                        </a>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 xl:grid-cols-2">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-2">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Total orders placed</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $dashboardStats['totalOrders'] }}</p>
                        <p class="mt-3 text-sm text-slate-500">All orders placed from your account.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Pending orders</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $dashboardStats['pendingOrders'] }}</p>
                        <p class="mt-3 text-sm text-slate-500">Orders waiting for confirmation or delivery.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Delivered orders</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $dashboardStats['deliveredOrders'] }}</p>
                        <p class="mt-3 text-sm text-slate-500">Orders successfully delivered to you.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm font-medium text-slate-500">Items in cart</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $dashboardStats['cartItems'] }}</p>
                        <p class="mt-3 text-sm text-slate-500">Current items waiting in your cart.</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Recent activity</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">Latest orders</h2>
                        </div>
                        <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-indigo-700">
                            {{ $dashboardStats['totalOrders'] }} total
                        </span>
                    </div>

                    @if($recentOrders->isEmpty())
                        <div class="mt-8 rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-6 text-sm text-slate-600">
                            You have no recent orders yet. Start by adding items to your cart and confirming an order.
                        </div>
                    @else
                        <div class="mt-6 space-y-4">
                            @foreach($recentOrders as $order)
                                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">{{ $order->titile ?? 'Order #' . $order->id }}</p>
                                            <p class="mt-1 text-sm text-slate-500">{{ $order->quantity }} item{{ $order->quantity > 1 ? 's' : '' }} · ৳{{ number_format($order->price * $order->quantity, 2) }}</p>
                                        </div>
                                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $order->delivery_status === 'delivered' ? 'bg-emerald-100 text-emerald-700' : ($order->delivery_status === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-700') }}">
                                            {{ ucfirst($order->delivery_status) }}
                                        </span>
                                    </div>
                                    <p class="mt-3 text-sm text-slate-500">{{ $order->address ?: 'No delivery address available' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>

            <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-slate-950 p-6 text-white shadow-sm">
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">Est. spend</p>
                    <p class="mt-4 text-3xl font-semibold">৳{{ number_format($dashboardStats['totalSpent'], 2) }}</p>
                    <p class="mt-3 text-sm text-slate-400">Total amount spent on orders so far.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Table reservations</p>
                    <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $dashboardStats['bookings'] }}</p>
                    <p class="mt-3 text-sm text-slate-500">Confirmed bookings linked to your account.</p>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
