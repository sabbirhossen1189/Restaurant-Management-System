<!-- Chart.js CDN for dynamic custom charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Mobile Sidebar Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('mobile-menu-toggle');
        const closeBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            if (sidebar && overlay) {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }
        }

        if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
        if (overlay) overlay.addEventListener('click', toggleSidebar);
    });
</script>