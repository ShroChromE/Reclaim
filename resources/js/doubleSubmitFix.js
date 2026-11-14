document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[data-prevent-double-submit]').forEach((form) => {
        form.addEventListener('submit', () => {
            const button = form.querySelector('button[type="submit"]');

            if (button) {
                button.disabled = true;
                button.classList.add('opacity-60', 'cursor-not-allowed');
                button.textContent = 'Mengirim...';
            }
        });
    });
});