// Render pie chart for Absentees (Current Month)
document.addEventListener('DOMContentLoaded', function() {
    // Show dashboard by default and when Admin Dashboard is clicked
    function showDashboard() {
        const dashboard = document.querySelector('.dashboard-container');
        if (dashboard) dashboard.style.display = 'block';
    }
    showDashboard();
    const adminDashboardItem = document.querySelector('.sidebar-submenu li.active');
    if (adminDashboardItem) {
        adminDashboardItem.addEventListener('click', showDashboard);
    }

    // Pie chart (using Chart.js)
    if (window.Chart) {
        const ctx = document.getElementById('absenteesChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['A', 'B', 'C', 'D'],
                datasets: [{
                    data: [12, 2, 1, 35],
                    backgroundColor: ['#f67280', '#4ecca3', '#f9a602', '#3a86ff'],
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }
});
