<div class="space-y-6">
  <!-- Header -->
  <div class="flex items-center justify-between">
    <h2 class="text-2xl font-bold text-slate-800 heading-font">Dashboard Overview</h2>
  </div>

  <!-- Top Stats Row (4 columns) -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Users Card -->
    <div
      class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col relative overflow-hidden group hover:shadow-md transition">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-sm font-medium text-slate-500 mb-1">Total Users</p>
          <h3 class="text-3xl font-bold text-slate-800">{{ $total_user }}</h3>
        </div>
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-xl">
          <i class="fa fa-users"></i>
        </div>
      </div>
      <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 45%"></div>
      </div>
    </div>

    <!-- Foods Card -->
    <div
      class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col relative overflow-hidden group hover:shadow-md transition">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-sm font-medium text-slate-500 mb-1">Menu Items</p>
          <h3 class="text-3xl font-bold text-slate-800">{{ $total_food }}</h3>
        </div>
        <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-lg flex items-center justify-center text-xl">
          <i class="fa fa-utensils"></i>
        </div>
      </div>
      <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
        <div class="bg-amber-500 h-1.5 rounded-full" style="width: 70%"></div>
      </div>
    </div>

    <!-- Total Orders Card -->
    <div
      class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col relative overflow-hidden group hover:shadow-md transition">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-sm font-medium text-slate-500 mb-1">Total Orders</p>
          <h3 class="text-3xl font-bold text-slate-800">{{ $total_order }}</h3>
        </div>
        <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-lg flex items-center justify-center text-xl">
          <i class="fa fa-shopping-bag"></i>
        </div>
      </div>
      <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
        <div class="bg-indigo-500 h-1.5 rounded-full" style="width: 60%"></div>
      </div>
    </div>

    <!-- Delivered Orders Card -->
    <div
      class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col relative overflow-hidden group hover:shadow-md transition">
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-sm font-medium text-slate-500 mb-1">Delivered</p>
          <h3 class="text-3xl font-bold text-slate-800">{{ $total_deliverd }}</h3>
        </div>
        <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-lg flex items-center justify-center text-xl">
          <i class="fa fa-check-circle"></i>
        </div>
      </div>
      <div class="w-full bg-slate-100 h-1.5 rounded-full mt-auto">
        <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 35%"></div>
      </div>
    </div>
  </div>

  <!-- Total Revenue Block (Full Width) -->
  <div
    class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl shadow-lg border border-slate-700 p-8 relative overflow-hidden">
    <!-- Decorative subtle background circle -->
    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white opacity-5 rounded-full blur-2xl"></div>
    <div class="relative z-10 flex items-center justify-between">
      <div>
        <div class="flex items-center gap-3 mb-2">
          <div class="w-10 h-10 bg-emerald-500/20 text-emerald-400 rounded-lg flex items-center justify-center">
            <i class="fa fa-dollar-sign text-xl"></i>
          </div>
          <h3 class="text-lg font-medium text-slate-300">Total Lifetime Revenue</h3>
        </div>
        <p class="text-5xl font-bold text-white tracking-tight">${{ number_format($total_revenue, 2) }}</p>
      </div>
      <div
        class="hidden sm:block text-slate-400 text-sm bg-slate-800/50 px-4 py-2 rounded-full border border-slate-700">
        From successfully delivered orders
      </div>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Orders By Status Pie Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 lg:col-span-1">
      <h3 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b border-slate-100">Orders By Status</h3>
      <div class="relative h-64 w-full flex items-center justify-center">
        <canvas id="orderStatusChart"></canvas>
      </div>
    </div>

    <!-- Popular Foods Bar Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 lg:col-span-2">
      <h3 class="text-lg font-bold text-slate-800 mb-4 pb-4 border-b border-slate-100">Top 5 Popular Foods (Delivered)
      </h3>
      <div class="relative h-64 w-full flex items-center justify-center">
        <canvas id="popularFoodChart"></canvas>
      </div>
    </div>
  </div>
</div>

<footer class="mt-8 pt-8 border-t border-slate-200">
  <p class="text-center text-sm text-slate-500">2026 &copy; The Velvet Spoon. Designed by Moshiur.</p>
</footer>

<!-- Chart.js Instantiation Scripts -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Parse the PHP aggregated data into JavaScript objects
    const rawOrderStatuses = @json($order_statuses);
    const rawPopularFoods = @json($popular_foods);

    // Color palette corresponding to Velvet Spoon theme
    const themeColors = ['#e11d48', '#f59e0b', '#10b981', '#6366f1', '#8b5cf6'];

    // 1. Order Status Pie Chart
    if (Object.keys(rawOrderStatuses).length > 0) {
      const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
      new Chart(statusCtx, {
        type: 'doughnut',
        data: {
          labels: Object.keys(rawOrderStatuses),
          datasets: [{
            data: Object.values(rawOrderStatuses),
            backgroundColor: themeColors,
            borderWidth: 2,
            borderColor: '#ffffff',
            hoverOffset: 4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                padding: 20,
                font: { family: "'Poppins', sans-serif" }
              }
            }
          },
          cutout: '70%'
        }
      });
    } else {
      document.getElementById('orderStatusChart').parentElement.innerHTML = "<p class='text-slate-400 text-sm'>No orders recorded yet</p>";
    }

    // 2. Popular Foods Bar Chart
    if (Object.keys(rawPopularFoods).length > 0) {
      const foodCtx = document.getElementById('popularFoodChart').getContext('2d');
      new Chart(foodCtx, {
        type: 'bar',
        data: {
          labels: Object.keys(rawPopularFoods),
          datasets: [{
            label: 'Times Ordered',
            data: Object.values(rawPopularFoods),
            backgroundColor: '#e11d48', // Tailwind rose-600
            borderRadius: 6,
            barPercentage: 0.6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
                font: { family: "'Poppins', sans-serif" }
              },
              grid: {
                color: '#f1f5f9',
                drawBorder: false
              },
              border: { display: false }
            },
            x: {
              ticks: { font: { family: "'Poppins', sans-serif" } },
              grid: { display: false },
              border: { display: false }
            }
          },
          plugins: {
            legend: { display: false }
          }
        });
    } else {
      document.getElementById('popularFoodChart').parentElement.innerHTML = "<p class='text-slate-400 text-sm'>No delivered foods to show</p>";
    }
  });
</script>