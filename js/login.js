document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('login-form');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        if (username === 'admin' && password === 'admin') {
            window.location.href = 'dashboard.php';
        } else {
            errorMessage.textContent = 'Invalid username or password.';
        }
    });
});
