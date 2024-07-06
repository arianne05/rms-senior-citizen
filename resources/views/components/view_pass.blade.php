<script>
    // JavaScript to toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordField = document.querySelector('input[name="password"]');
    const confirmPasswordField = document.querySelector('input[name="password_confirmation"]');

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<span class="material-symbols-outlined">visibility</span>' : '<span class="material-symbols-outlined">visibility_off</span>';
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordField.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<span class="material-symbols-outlined">visibility</span>' : '<span class="material-symbols-outlined">visibility_off</span>';
    });
</script>