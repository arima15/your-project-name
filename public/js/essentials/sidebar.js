document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggles = document.querySelectorAll('.sidebar-toggle');
    const body = document.body;
    const sidebar = document.querySelector('.sidebar');

    sidebarToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            body.classList.toggle('sidebar-visible');
            sidebar.style.left = body.classList.contains('sidebar-visible') ? '0' : '-250px';
        });
    });
});